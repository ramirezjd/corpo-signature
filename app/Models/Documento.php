<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'cabecera_id',
        'status_id',
        'cuerpo_documento',
        'cuerpo_documento_unformatted',
        'descripcion_documento',
        'fecha_emision',
    ];
    
    public function cabecera()
    {
        return $this->belongsTo(Cabecera::class);
    }
    
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'usuarios_por_documentos')->withPivot('firma_id', 'condicion', 'aprobacion');
    }

    public function usuariosSolicitante()
    {
        return $this->belongsToMany(User::class, 'usuarios_por_documentos')->withPivot('firma_id', 'condicion', 'aprobacion')->wherePivot('condicion', 'solicitante');
    }

    public function usuariosRevisor()
    {
        return $this->belongsToMany(User::class, 'usuarios_por_documentos')->withPivot('firma_id', 'condicion', 'aprobacion')->wherePivot('condicion', 'revisor');
    }

}
