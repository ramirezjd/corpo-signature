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
        return $this->belongsToMany(User::class, 'usuarios_por_documentos');
        // belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }
}
