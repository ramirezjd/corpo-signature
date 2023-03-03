<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class UsuariosPorDocumento extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'documento_id',
        'user_id',
        'condicion',
    ];
}
