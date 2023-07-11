<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        if (!$user->can('listar roles') && !$user->hasRole('super-admin')) {
            return view('auth.unauthorized', [
                'root' => 'Roles',
                'page' => '',
            ]);
        }
        $roles = role::all()->except('1');

        return view('roles.index', [
            'roles' => $roles,
            'root' => 'Roles',
            'page' => '',
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
        if (!$user->can('crear roles') && !$user->hasRole('super-admin')) {
            return view('auth.unauthorized', [
                'root' => 'Roles',
                'page' => '',
            ]);
        }
        $permissions = Permission::all();
        return view('roles.create', [
            'permissions' => $permissions,
            'root' => 'Roles',
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
        $user = User::findOrFail(Auth::id());
        if (!$user->can('crear roles') && !$user->hasRole('super-admin')) {
            return view('auth.unauthorized', [
                'root' => 'Roles',
                'page' => '',
            ]);
        }
        $rol = Role::create(['name' => $request->name]);

        if ($request->get('permissions')) {
            $permissions_array = $request->get('permissions');
            $max = count($permissions_array);

            for ($i = 0; $i < $max; $i++) {
                $permiso = DB::table('permissions')->where('id', '=', $permissions_array[$i])->first();
                $rol->givePermissionTo($permiso->name);
            }
        }
        return redirect('/roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail(Auth::id());
        if (!$user->can('ver roles') && !$user->hasRole('super-admin')) {
            return view('auth.unauthorized', [
                'root' => 'Roles',
                'page' => '',
            ]);
        }
        $role = role::find($id);
        $permissions = $role->getAllPermissions();

        return view('roles.show', [
            'role' => $role,
            'permissions' => $permissions,
            'root' => 'Roles',
            'page' => 'Editar',
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
        $user = User::findOrFail(Auth::id());
        if (!$user->can('editar roles') && !$user->hasRole('super-admin')) {
            return view('auth.unauthorized', [
                'root' => 'Roles',
                'page' => '',
            ]);
        }
        $role = role::find($id);
        $permissions = permission::all();

        return view('roles.edit', [
            'role' => $role,
            'permissions' => $permissions,
            'root' => 'Roles',
            'page' => 'Ver',
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
        $user = User::findOrFail(Auth::id());
        if (!$user->can('editar roles') && !$user->hasRole('super-admin')) {
            return view('auth.unauthorized', [
                'root' => 'Roles',
                'page' => '',
            ]);
        }
        $affected = role::find($id);

        $affected->update(['name' => $request->name]);

        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            if ($affected->hasPermissionTo($permission->id)) {
                $affected->revokePermissionTo($permission->name);
            }
        }

        if ($request->get('permissions')) {
            $permissions_array = $request->get('permissions');
            $max = count($permissions_array);

            for ($i = 0; $i < $max; $i++) {
                $affected->givePermissionTo($permissions_array[$i]);
            }
        }
        return redirect('/roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::where('rol', $id)->count();
        $user = User::findOrFail(Auth::id());
        if (!$user->can('borrar roles') && !$user->hasRole('super-admin')) {
            return view('auth.unauthorized', [
                'root' => 'Roles',
                'page' => '',
            ]);
        }
        $affected = role::find($id);
        
        $validator = Validator::make(["users" => $users], [
            'users' => 'max:0',
        ], [
            'users.max' => "Aun existen usuarios con el rol $affected->name",
        ]);
        if ($users > 0) {
            return redirect('/roles')->withErrors($validator);
        }
        $affected->delete();
        return redirect('/roles');
    }

    public function getpermissions(Request $request)
    {
        $id = $request->id;
        $role = role::find($id);
        return $role->getAllPermissions();
    }
}
