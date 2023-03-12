<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\User;
use App\Models\Firma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class DocumentoController extends Controller
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
        return view('documentos.index', [
            'root' => 'Documentos',
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
        $users = User::all();
        return view('documentos.create', [
            'root' => 'Documentos',
            'page' => 'Crear',
            'users' => $users,
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
        $usersIds = request('usersarray');
        $usersArray = explode(" ", $usersIds);
        $usersObjects = User::whereIn('id', $usersArray)->get();
        foreach($usersObjects as $user ) {
            // $user['firma'] = Firma::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();
            $firma = Firma::where('user_id', 3)->orderBy('created_at', 'desc')->first();
            $signaturePath = Storage::url($firma->img_path);
            $user['signaturePath'] = $signaturePath;
        }
        $body = request('document_body');
        
        $pdf = PDF::loadView('documentos.documentopdf',[
            'body' => $body,
            'users' => $usersObjects,
        ]);

        return $pdf->download(uniqid() .'.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function show(Documento $documento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function edit(Documento $documento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documento $documento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
    public function downloadPdf($id)
    {
        $pdf = PDF::loadView('documentos.documentopdf',[
            'id' => $id,
        ]);

        return $pdf->download($id . uniqid() .'.pdf');
    }
    
}
