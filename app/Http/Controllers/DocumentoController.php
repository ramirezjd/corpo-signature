<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\UsuariosPorDocumento;
use App\Models\Cabecera;
use App\Models\User;
use App\Models\Firma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewSignatureRequest;
use PDF;
use Notification;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser = Auth::user();
        
        $docsSolicitante = $currentUser->documentosSolicitante->sortByDesc('created_at');
        foreach ($docsSolicitante as $documento) {
            $pendientes = 0;
            $aprobados = 0;
            $docsRevisar = $documento->usuariosRevisor;
            foreach ($docsRevisar as $doc ) {
                if($doc->pivot->aprobacion){
                    $aprobados++;
                }
                else{
                    $pendientes++;
                }
            }
            $documento['pendientes'] = $pendientes;
            $documento['aprobados'] = $aprobados;
            $documento['descargar'] = count( $documento->usuariosRevisor ) == $aprobados;
        }

        $docsRevisor = $currentUser->documentosRevisor->sortByDesc('created_at');
        foreach ($docsRevisor as $documento) {
            $pendientes = 0;
            $aprobados = 0;
            $docsRevisar = $documento->usuariosRevisor;
            foreach ($docsRevisar as $doc ) {
                if($doc->pivot->aprobacion){
                    $aprobados++;
                }
                else{
                    $pendientes++;
                }
            }
            if($documento->pivot->aprobacion && ($documento->pivot->user_id == $currentUser->id) && ($documento->pivot->documento_id == $documento->id)){
                $documento['aprobado'] = true;
            }
            else{
                $documento['aprobado'] = false;
            }
            $documento['pendientes'] = $pendientes;
            $documento['aprobados'] = $aprobados;
            $documento['descargar'] = count( $documento->usuariosRevisor ) == $aprobados;
        }

        return view('documentos.index', [
            'root' => 'Documentos',
            'page' => '',
            'documentosSolicitante' => $docsSolicitante,
            'documentosRevisor' => $docsRevisor,
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
        $cabeceras = Cabecera::all();
        return view('documentos.create', [
            'root' => 'Documentos',
            'page' => 'Crear',
            'users' => $users,
            'cabeceras' => $cabeceras,
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
            'usersarray' => 'required',
            'document_body' => 'required',
            'document_body_unformatted' => 'required',
            'id_cabecera' => 'required',
        ]);


        $header = Cabecera::findOrFail(request('id_cabecera'));
        $body = request('document_body');

        $documento = Documento::create([
            'cabecera_id' => $header->id,
            'status_id' => 1,
            'cuerpo_documento' => $body,
            'descripcion_documento' => request('descripcion_documento') ?? '',
            'cuerpo_documento_unformatted' => request('document_body_unformatted'),
        ]);

 
        $usuarioSolicitante = auth()->user();
        
        $usersIds = request('usersarray');
        $usersArray = explode(" ", $usersIds);
        $usersObjects = User::whereIn('id', $usersArray)->get();
        foreach ($usersObjects as $user) {
            $firma = Firma::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();
            UsuariosPorDocumento::create([
                'documento_id' => $documento->id,
                'user_id' => $user->id,
                'firma_id' => $firma->id,
                'condicion' => 'revisor',
            ]);
            Notification::send($user, new NewSignatureRequest($usuarioSolicitante, $documento));
        
        }

        $currentUser = Auth::user();
        $firmaCurrent = Firma::where('user_id', $currentUser->id)->orderBy('created_at', 'desc')->first();
        UsuariosPorDocumento::create([
            'documento_id' => $documento->id,
            'user_id' => $currentUser->id,
            'firma_id' => $firmaCurrent->id,
            'condicion' => 'solicitante',
        ]);
        return redirect('/documentos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currentUser = Auth::user();
        $users = User::all();
        $cabeceras = Cabecera::all();
        $documento = Documento::findOrFail($id);
        $documento['aprobado'] = false;
        $documento['bodyJson'] = json_encode ($documento->cuerpo_documento_unformatted, true);
        $usuariosRevisores = $documento->usuariosRevisor;
        $selectedUsers = [];
        foreach ($usuariosRevisores as $user) {
            array_push($selectedUsers, strval($user->id));
            if($user->pivot->aprobacion && ($user->pivot->user_id == $currentUser->id) && ($user->pivot->documento_id == $documento->id)){
                $documento['aprobado'] = true;
            }
        }
        
        return view('documentos.show', [
            'root' => 'Documentos',
            'page' => 'Ver',
            'users' => $users,
            'selectedUsers' => "".json_encode($selectedUsers)."",
            'cabeceras' => $cabeceras,
            'documento' => $documento,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
        $cabeceras = Cabecera::all();
        $documento = Documento::findOrFail($id);
        $documento['bodyJson'] = json_encode ($documento->cuerpo_documento_unformatted, true);
        $usuariosRevisores = $documento->usuariosRevisor;
        $selectedUsers = [];
        foreach ($usuariosRevisores as $user) {
            array_push($selectedUsers, strval($user->id));
        }
        
        return view('documentos.edit', [
            'root' => 'Documentos',
            'page' => 'Editar',
            'users' => $users,
            'selectedUsers' => "".json_encode($selectedUsers)."",
            'cabeceras' => $cabeceras,
            'documento' => $documento,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        $currentUser = Auth::user();
        $documento = Documento::findOrFail($id);
        $header = Cabecera::findOrFail($documento->cabecera_id);
        $body = $documento->cuerpo_documento;

        $headerBodyRaw = $header->cuerpo_cabecera;
        $order   = array("\r\n", "\n", "\r");
        $replace = '<br />';
        $bodyHeader = str_replace($order, $replace, $headerBodyRaw);
        $header['urlLogo'] = Storage::url($header->img_path);
        $header['bodyHeader'] = $bodyHeader;

        $revisores = $documento->usuariosRevisor;
        // $usersIds = request('usersarray');
        // $usersArray = explode(" ", $usersIds);
        // $usersObjects = User::whereIn('id', $usersArray)->get();
        foreach($revisores as $user ) {
            $firma = Firma::findOrFail($user->pivot->firma_id);
            $signaturePath = Storage::url($firma->img_path);
            $user['signaturePath'] = $signaturePath;
        }

        $pdf = PDF::loadView('documentos.documentopdf',[
            'body' => $body,
            'users' => $revisores,
            'header' => $header,
        ]);

        return $pdf->download($id . uniqid() . '.pdf');
    }

    public function approve($id)
    {
        $currentUser = Auth::user();
        $documento = Documento::findOrFail($id);
        $approvalItem = UsuariosPorDocumento::where("user_id", $currentUser->id)->where("documento_id", $documento->id)->where("condicion", "revisor")->first();
        $approvalItem['aprobacion'] = 1;
        $approvalItem->save();
        return redirect('/documentos');
    }
}
