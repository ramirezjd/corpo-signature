<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Departamento;
use App\Models\Firma;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
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
        $departamentos = Departamento::all();
        return view('users.create', [
            'departamentos' => $departamentos,
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
        $request->validate([
            'primer_nombre_usuario' => 'required|max:30',
            'segundo_nombre_usuario' => 'required|max:30',
            'primer_apellido_usuario' => 'required|max:30',
            'segundo_apellido_usuario' => 'required|max:30',
            'departamento_id' => 'required',
            'documento_usuario' => 'required|max:16',
            'email' => 'required|email:rfc',
            'password' => 'required',
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
        $user = User::findOrFail($id);
        $firma = Firma::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();
        $signaturePath = Storage::url($firma->img_path);
        return view('users.show', [
            'root' => 'Usuarios',
            'page' => 'Ver',
            'usuario' => $user,
            'signaturePath' => $signaturePath,
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
        $user = User::findOrFail($id);
        $firma = Firma::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();
        $signaturePath = Storage::url($firma->img_path);
        $departamentos = Departamento::all();
        return view('users.edit', [
            'root' => 'Usuarios',
            'page' => 'Ver',
            'usuario' => $user,
            'signaturePath' => $signaturePath,
            'departamentos' => $departamentos,
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
        $request->validate([
            'primer_nombre_usuario' => 'required|max:30',
            'segundo_nombre_usuario' => 'required|max:30',
            'primer_apellido_usuario' => 'required|max:30',
            'segundo_apellido_usuario' => 'required|max:30',
            'departamento_id' => 'required',
            'documento_usuario' => 'required|max:16',
            'email' => 'required|email:rfc',
        ]);

        $user = User::findOrFail($id);

        $user->nombres_usuario = request('nombres_usuario');
        $user->apellidos_usuario = request('apellidos_usuario');
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
        $user = User::findOrFail($id);
        // $firmas = Firma::where('user_id', $user->id)->get();
        // foreach($firmas as $firma){
        //     $firma->delete();
        // }
        $user->delete();
        return redirect('/usuarios');
    }
}
