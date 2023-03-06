<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        
        $departamento = Departamento::findOrFail($id);
        $departamento->delete();
        return redirect('/departamentos');
    }
}
