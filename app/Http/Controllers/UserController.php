<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Departamento;
use App\Models\Firma;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        if(!$user->can('listar usuario') && !$user->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Usuarios',
                'page' => '',
            ]);
        }

        if($user->hasRole('super-admin')){
            $users = User::all();
        }
        else{
            $users = User::all()->except(1);
        }
        // $departamentos = Departamento::withTrashed()->get();
        return view('users.index', [
            'root' => 'Usuarios',
            'page' => '',
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::findOrFail(Auth::id());
        if(!$user->can('crear usuario') && !$user->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Usuarios',
                'page' => '',
            ]);
        }
        $permissions = Permission::all();
        $roles = Role::all()->except(1);
        
        if($user->hasRole('super-admin')){
            $departamentos = Departamento::all()->except(1);
        }
        else{
            $departamentos = Departamento::where('id', $user->departamento->id)->get();
        }

        return view('users.create', [
            'departamentos' => $departamentos,
            'permissions' => $permissions,
            'roles' => $roles,
            'root' => 'Usuarios',
            'page' => 'Crear',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rol = role::findOrFail(request('roles'));
        $user = User::findOrFail(Auth::id());
        if(!$user->can('crear usuario') && !$user->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Usuarios',
                'page' => '',
            ]);
        }
        $request->validate([
            'primer_nombre_usuario' => 'required|max:30',
            'segundo_nombre_usuario' => 'required|max:30',
            'primer_apellido_usuario' => 'required|max:30',
            'segundo_apellido_usuario' => 'required|max:30',
            'departamento_id' => 'required',
            'documento_usuario' => 'required|max:16',
            'email' => 'required|email:rfc',
            'password' => 'required',
            'roles' => 'required',
            'permissions' => 'required',
            'signed' => 'required_without:signatureFile',
            'signatureFile' => 'required_without:signed|mimes:png,jpg,jpeg|max:2048'
        ]);

        $user = User::create([
            'primer_nombre_usuario' => request('primer_nombre_usuario'),
            'segundo_nombre_usuario' => request('segundo_nombre_usuario'),
            'primer_apellido_usuario' => request('primer_apellido_usuario'),
            'segundo_apellido_usuario' => request('segundo_apellido_usuario'),
            'departamento_id' => request('departamento_id'),
            'email' => request('email'),
            'rol' => $rol->id,
            'roleName' => $rol->name,
            'password' => Hash::make(request('password')),
            'documento_usuario' => request('documento_usuario'),
        ]);

        $userId = $user->id;

        $firma = Firma::create([
            'user_id' => $userId,
        ]);
        
        $firmaId = $firma->id;
        $signaturePath = '';

        if(isset($request->signed)){
            $image_parts = explode(";base64,", $request->signed);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $path =  'public/signatures/' . $firmaId . uniqid() . '.'.$image_type;
            $signaturePath = $path;
            Storage::put($path, $image_base64);
        }
        else{
            $signaturePath = Storage::putFile('public/signatures', $request->file('signatureFile'));
        }

        $firma->update([
            'img_path' => $signaturePath,
        ]);

        $permissions_array = $request->get('permissions');
        for($i=0; $i < count($permissions_array); $i++){
            $user->givePermissionTo($permissions_array[$i]);
        }
        
        return redirect('/usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currentUser = User::findOrFail(Auth::id());
        if(!$currentUser->can('ver usuario') && !$currentUser->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Usuarios',
                'page' => '',
            ]);
        }
        $user = User::findOrFail($id);
        $firma = Firma::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();
        $signaturePath = Storage::url($firma->img_path);
        $permissions = Permission::all();
        $aspermissions = $user->getDirectPermissions();
        $arraypermisos = [];
        $count = 0;
        foreach ($aspermissions as $permiso){
            $arraypermisos[$count] = $permiso->id;
            $count++;
        }
        return view('users.show', [
            'root' => 'Usuarios',
            'page' => 'Ver',
            'usuario' => $user,
            'signaturePath' => $signaturePath,
            'permissions' => $permissions,
            'arraypermisos' => $arraypermisos,
            'alength' => count($arraypermisos),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currentUser = User::findOrFail(Auth::id());
        if(!$currentUser->can('editar usuario') && !$currentUser->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Usuarios',
                'page' => '',
            ]);
        }
        $user = User::findOrFail($id);
        $firma = Firma::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();
        $signaturePath = Storage::url($firma->img_path);
        $departamentos = Departamento::all();

        $permissions = Permission::all();
        $roles = Role::all()->except(1);
        if($user->hasRole('super-admin')){
            $departamentos = Departamento::all()->except(1);
        }
        else{
            $departamentos = Departamento::where('id', $user->departamento_id)->get();
        }
        $aspermissions = $user->getDirectPermissions();
        $arraypermisos = [];
        $count = 0;
        foreach ($aspermissions as $permiso){
            $arraypermisos[$count] = $permiso->id;
            $count++;
        }
        return view('users.edit', [
            'root' => 'Usuarios',
            'page' => 'Ver',
            'usuario' => $user,
            'signaturePath' => $signaturePath,
            'departamentos' => $departamentos,
            'roles' => $roles,
            'permissions' => $permissions,
            'arraypermisos' => $arraypermisos,
            'alength' => count($arraypermisos),
            'role_id' => $user->rol,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $currentUser = User::findOrFail(Auth::id());
        if(!$currentUser->can('editar usuario') && !$currentUser->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Usuarios',
                'page' => '',
            ]);
        }
        $request->validate([
            'primer_nombre_usuario' => 'required|max:30',
            'segundo_nombre_usuario' => 'required|max:30',
            'primer_apellido_usuario' => 'required|max:30',
            'segundo_apellido_usuario' => 'required|max:30',
            'departamento_id' => 'required',
            'documento_usuario' => 'required|max:16',
            'email' => 'required|email:rfc',
            'roles' => 'required',
            'permissions' => 'required',
        ]);

        $user = User::findOrFail($id);

        $user->primer_nombre_usuario = request('primer_nombre_usuario');
        $user->segundo_nombre_usuario = request('segundo_nombre_usuario');
        $user->primer_apellido_usuario = request('primer_apellido_usuario');
        $user->segundo_apellido_usuario = request('segundo_apellido_usuario');
        $user->departamento_id = request('departamento_id');
        $user->documento_usuario = request('documento_usuario');
        $user->email = request('email');

        if(isset($request->signed) || isset($request->file)){
            $userId = $user->id;

            $firma = Firma::create([
                'user_id' => $userId,
            ]);
            
            $firmaId = $firma->id;
            $signaturePath = '';
    
            if(isset($request->signed)){
                $image_parts = explode(";base64,", $request->signed);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);
                $path =  'public/signatures/' . $firmaId . uniqid() . '.'.$image_type;
                $signaturePath = $path;
                Storage::put($path, $image_base64);
            }
            else{
                $signaturePath = Storage::putFile('public/signatures', $request->file('signatureFile'));
            }
    
            $firma->update([
                'img_path' => $signaturePath,
            ]);
        }

        $permissions = Permission::all();
        $rol = role::findOrFail($request->get('roles'));
        $user->roleName = $rol->name;
        $user->rol = $request->get('roles');

        foreach ($permissions as $permission){
            if($user->hasPermissionTo($permission->id)){
                $user->revokePermissionTo($permission->name);
            }
        }
        $permissions_array = $request->get('permissions');
        for($i=0; $i < count($permissions_array); $i++){
            $user->givePermissionTo($permissions_array[$i]);
        }
        
        $user->save();
        return redirect('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currentUser = User::findOrFail(Auth::id());
        if(!$currentUser->can('borrar usuario') && !$currentUser->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Usuarios',
                'page' => '',
            ]);
        }
        $user = User::findOrFail($id);
        // $firmas = Firma::where('user_id', $user->id)->get();
        // foreach($firmas as $firma){
        //     $firma->delete();
        // }
        $user->delete();
        return redirect('/usuarios');
    }

    public function profile()
    {
        $user = User::findOrFail(Auth::id());        
        return view('auth.profile', [
            'root' => 'Usuario',
            'page' => 'Perfil',
            'usuario' => $user,
        ]);
    }

    public function changePassword(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()
            ->uncompromised()],
        ]);

        $user = User::findOrFail($id);
        $user->password = Hash::make(request('password'));
                
        $user->save();
        return redirect('/perfil');
    }
}
