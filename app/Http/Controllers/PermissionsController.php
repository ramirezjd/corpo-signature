<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        if(!$user->can('listar permisos') && !$user->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Permisos',
                'page' => '',
            ]);
        }
        $permissions = DB::table('permissions')->get();
        $roles = DB::table('roles')->get();

        return view('permissions.index', [
            'permissions' => $permissions,
            'roles' => $roles,
        ]);
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
        if(!$user->can('ver permisos') && !$user->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Permisos',
                'page' => '',
            ]);
        }
        $permissions = DB::table('permissions')->find($id);
        return view('permissions.show', ['permissions' => $permissions]);
    }

    public function edit($id)
    {
        $user = User::findOrFail(Auth::id());
        if(!$user->can('editar permisos') && !$user->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Permisos',
                'page' => '',
            ]);
        }
        $permissions = DB::table('permissions')->find($id);
        return view('permissions.edit', ['permissions' => $permissions]);
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
        if(!$user->can('editar permisos') && !$user->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Permisos',
                'page' => '',
            ]);
        }
        $affected = DB::table('permissions')
              ->where('id', $id)
              ->update(['name' => $request->name]);

        return redirect()->route('permissions.index');
    }
}
