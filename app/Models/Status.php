<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nombre_status',
        'descripcion_status',
    ];

    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }
}
