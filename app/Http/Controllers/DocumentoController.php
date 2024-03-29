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
        $currentUser = User::findOrFail(Auth::id());
        if(!$currentUser->can('listar documento') && !$currentUser->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Documentos',
                'page' => '',
            ]);
        }
        return redirect('/documentos/solicitante');
        
        // $currentUser = Auth::user();
        
        // $docsSolicitante = $currentUser->documentosSolicitante->sortByDesc('created_at');
        // foreach ($docsSolicitante as $documento) {
        //     $pendientes = 0;
        //     $aprobados = 0;
        //     $docsRevisar = $documento->usuariosRevisor;
        //     foreach ($docsRevisar as $doc ) {
        //         if($doc->pivot->aprobacion){
        //             $aprobados++;
        //         }
        //         else{
        //             $pendientes++;
        //         }
        //     }
        //     $documento['pendientes'] = $pendientes;
        //     $documento['aprobados'] = $aprobados;
        //     $documento['descargar'] = $documento->status_id == 2;
        // }

        // $docsRevisor = $currentUser->documentosRevisor->sortByDesc('created_at');
        // foreach ($docsRevisor as $documento) {
        //     $pendientes = 0;
        //     $aprobados = 0;
        //     $docsRevisar = $documento->usuariosRevisor;
        //     foreach ($docsRevisar as $doc ) {
        //         if($doc->pivot->aprobacion){
        //             $aprobados++;
        //         }
        //         else{
        //             $pendientes++;
        //         }
        //     }
        //     if($documento->pivot->aprobacion && ($documento->pivot->user_id == $currentUser->id) && ($documento->pivot->documento_id == $documento->id)){
        //         $documento['aprobado'] = true;
        //     }
        //     else{
        //         $documento['aprobado'] = false;
        //     }
        //     $documento['pendientes'] = $pendientes;
        //     $documento['aprobados'] = $aprobados;
        //     $documento['descargar'] = $documento->status_id == 2;
        // }

        // return view('documentos.index', [
        //     'root' => 'Documentos',
        //     'page' => '',
        //     'documentosSolicitante' => $docsSolicitante,
        //     'documentosRevisor' => $docsRevisor,
        // ]);
    }

    public function solicitante()
    {
        $currentUser = User::findOrFail(Auth::id());
        if(!$currentUser->can('listar documento') && !$currentUser->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Documentos',
                'page' => '',
            ]);
        }
        
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
            $documento['descargar'] = $documento->status_id == 2;
        }

        return view('documentos.index', [
            'root' => 'Documentos',
            'page' => '',
            'title' => 'Documentos creados por ti',
            'role' => "solicitante",
            'documentos' => $docsSolicitante,
        ]);
    }

    public function revisor()
    {
        $currentUser = User::findOrFail(Auth::id());
        if(!$currentUser->can('listar documento') && !$currentUser->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Documentos',
                'page' => '',
            ]);
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
            $documento['descargar'] = $documento->status_id == 2;
        }

        return view('documentos.index', [
            'root' => 'Documentos',
            'page' => '',
            'title' => 'Documentos firma solicitada',
            'role' => "revisor",
            'documentos' => $docsRevisor,
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currentUser = User::findOrFail(Auth::id());
        if(!$currentUser->can('crear documento') && !$currentUser->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Documentos',
                'page' => '',
            ]);
        }

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
        $currentUser = User::findOrFail(Auth::id());
        if(!$currentUser->can('crear documento') && !$currentUser->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Documentos',
                'page' => '',
            ]);
        }

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
        $currentUser = User::findOrFail(Auth::id());
        if(!$currentUser->can('ver documento') && !$currentUser->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Documentos',
                'page' => '',
            ]);
        }

        $counting = UsuariosPorDocumento::where('documento_id', $id)->where('user_id', $currentUser->id)->count();
        if($counting === 0){
            return redirect('/documentos');
        }
        $documento = Documento::findOrFail($id);
        $header = Cabecera::findOrFail($documento->cabecera_id);
        $body = $documento->cuerpo_documento;

        $headerBodyRaw = $header->cuerpo_cabecera;
        $order   = array("\r\n", "\n", "\r");
        $replace = '<br />';
        $bodyHeader = str_replace($order, $replace, $headerBodyRaw);
        $header['urlLogo'] = Storage::url($header->img_path);
        $header['bodyHeader'] = $bodyHeader;

        $revisores = [];

        $pdf = PDF::loadView('documentos.documentopdf',[
            'body' => $body,
            'users' => $revisores,
            'header' => $header,
        ]);
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();

        $height = $canvas->get_height();
        $width = $canvas->get_width();

        $canvas->set_opacity(.2,"Multiply");

        $canvas->set_opacity(.2);

        $canvas->page_text($width/8, $height/3, 'PREVISUALIZACION', null,
        55, array(0,0,0),2,2,-30);
        $canvas->page_text($width/8, $height/1.7, 'PREVISUALIZACION', null,
        55, array(0,0,0),2,2,-30);
        $canvas->page_text($width/8, $height/1.15, 'PREVISUALIZACION', null,
        55, array(0,0,0),2,2,-30);

        return $pdf->stream("", array("Attachment" => false));


        // $currentUser = Auth::user();
        // $users = User::all();
        // $cabeceras = Cabecera::all();
        // $documento = Documento::findOrFail($id);
        // $documento['aprobado'] = false;
        // $documento['bodyJson'] = json_encode ($documento->cuerpo_documento_unformatted, true);
        // $usuariosRevisores = $documento->usuariosRevisor;
        // $selectedUsers = [];
        // foreach ($usuariosRevisores as $user) {
        //     array_push($selectedUsers, strval($user->id));
        //     if($user->pivot->aprobacion && ($user->pivot->user_id == $currentUser->id) && ($user->pivot->documento_id == $documento->id)){
        //         $documento['aprobado'] = true;
        //     }
        // }
        
        // return view('documentos.show', [
        //     'root' => 'Documentos',
        //     'page' => 'Ver',
        //     'users' => $users,
        //     'selectedUsers' => "".json_encode($selectedUsers)."",
        //     'cabeceras' => $cabeceras,
        //     'documento' => $documento,
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currentUser = User::findOrFail(Auth::id());
        if(!$currentUser->can('editar documento') && !$currentUser->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Documentos',
                'page' => '',
            ]);
        }
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
        $currentUser = User::findOrFail(Auth::id());
        if(!$currentUser->can('editar documento') && !$currentUser->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Documentos',
                'page' => '',
            ]);
        }
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
        $currentUser = User::findOrFail(Auth::id());
        if(!($currentUser->can('crear documento') || $currentUser->can('firmar documento')) && !$currentUser->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Documentos',
                'page' => '',
            ]);
        }
        $counting = UsuariosPorDocumento::where('documento_id', $id)->where('user_id', $currentUser->id)->count();
        if($counting === 0){
            return redirect('/documentos');
        }
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
        $currentUser = User::findOrFail(Auth::id());
        if(!$currentUser->can('firmar documento') && !$currentUser->hasRole('super-admin')){
            return view('auth.unauthorized', [
                'root' => 'Documentos',
                'page' => '',
            ]);
        }
        $documento = Documento::findOrFail($id);
        $approvalItem = UsuariosPorDocumento::where("user_id", $currentUser->id)->where("documento_id", $documento->id)->where("condicion", "revisor")->first();
        $approvalItem['aprobacion'] = 1;
        $approvalItem->save();

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
        if(count( $documento->usuariosRevisor ) == $aprobados){
            $documento->status_id = 2;
            $documento->save();
        }
        return redirect('/documentos');
    }
}
