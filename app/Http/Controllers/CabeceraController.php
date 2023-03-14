<?php

namespace App\Http\Controllers;

use App\Models\Cabecera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CabeceraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cabeceras = Cabecera::all();
        // $departamentos = Departamento::withTrashed()->get();
        return view('cabeceras.index', [
            'root' => 'Cabeceras',
            'page' => '',
            'cabeceras' => $cabeceras,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cabeceras.create', [
            'root' => 'Cabeceras',
            'page' => 'Crear'
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
            'header_name' => 'required',
            'header_body' => 'required',
            'logoFile' => 'required',
        ]);

        $logoPath = Storage::putFile('public/logos', $request->file('logoFile'));

        Cabecera::create([
            'nombre_cabecera' => request('header_name'),
            'cuerpo_cabecera' => request('header_body'),
            'img_path' => $logoPath
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cabecera  $cabecera
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $header = Cabecera::findOrFail($id);
        $img_url = Storage::url($header->img_path);
        return view('cabeceras.show', [
            'root' => 'Cabeceras',
            'page' => 'Ver',
            'header' => $header,
            'img_url' => $img_url,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cabecera  $cabecera
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $header = Cabecera::findOrFail($id);
        $img_url = Storage::url($header->img_path);
        return view('cabeceras.edit', [
            'root' => 'Cabeceras',
            'page' => 'Editar',
            'header' => $header,
            'img_url' => $img_url
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cabecera  $cabecera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'header_name' => 'required',
            'header_body' => 'required',
        ]);
        $updateLogo = $request->file('logoFile') === null;

        $header = Cabecera::findOrFail($id);
        $header->nombre_cabecera = $request('header_name');
        $header->cuerpo_cabecera = $request('header_body');
        if(!$updateLogo){
            $logoPath = Storage::putFile('public/logos', $request->file('logoFile'));
            $header->img_path = $logoPath;
        }
        $header->save();
        
        return redirect('/cabeceras');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cabecera  $cabecera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cabecera $cabecera)
    {
        //
    }
}
