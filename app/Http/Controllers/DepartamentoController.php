<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        if(!$user->can('listar departamento') && !$user->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Departamentos',
                'page' => '',
            ]);
        }
        
        $departamentos = Departamento::all();
        // $departamentos = Departamento::withTrashed()->get();
        return view('departamentos.index', [
            'root' => 'Departamentos',
            'page' => '',
            'departamentos' => $departamentos,
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
        if(!$user->can('crear departamento') && !$user->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Departamentos',
                'page' => '',
            ]);
        }
        
        return view('departamentos.create', [
            'root' => 'Departamentos',
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
        if(!$user->can('crear departamento') && !$user->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Departamentos',
                'page' => '',
            ]);
        }
        $request->validate([
            'nombre_departamento' => 'bail|required',
        ]);

        $departamento = Departamento::create([
            'nombre_departamento' => request('nombre_departamento'),
            'codigo_departamento' => request('codigo_departamento'),
            'descripcion_departamento' => request('descripcion_departamento')
        ]);
        
        return redirect('/departamentos');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail(Auth::id());
        if(!$user->can('ver departamento') && !$user->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Departamentos',
                'page' => '',
            ]);
        }
        $departamento = Departamento::findOrFail($id);
        return view('departamentos.show', [
            'root' => 'Departamentos',
            'page' => 'Ver',
            'departamento' => $departamento,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail(Auth::id());
        if(!$user->can('editar departamento') && !$user->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Departamentos',
                'page' => '',
            ]);
        }
        $departamento = Departamento::findOrFail($id);
        return view('departamentos.edit', [
            'root' => 'Departamentos',
            'page' => 'Editar',
            'departamento' => $departamento,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail(Auth::id());
        if(!$user->can('editar departamento') && !$user->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Departamentos',
                'page' => '',
            ]);
        }
        $departamento = Departamento::findOrFail($id);
        
        $request->validate([
            'nombre_departamento' => 'bail|required',
        ]);

        $departamento->update([
            'nombre_departamento' => request('nombre_departamento'),
            'codigo_departamento' => request('codigo_departamento'),
            'descripcion_departamento' => request('descripcion_departamento')
        ]);
        
        return redirect('/departamentos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail(Auth::id());
        if(!$user->can('borrar departamento') && !$user->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Departamentos',
                'page' => '',
            ]);
        }
        $departamento = Departamento::findOrFail($id);
        $users = count($departamento->users);
        $validator = Validator::make(["users" => $users], [
            'users' => 'max:0',
        ], [
            'users.max' => "Aun existen usuarios asignados al departamento $departamento->nombre_departamento, asignelos a un departamento diferente",
        ]);
        if ($users > 0) {
            return redirect('/departamentos')->withErrors($validator);
        }

        $departamento->delete();
        return redirect('/departamentos');
    }
}
