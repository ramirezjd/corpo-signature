<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nombre_departamento',
        'codigo_departamento',
        'descripcion_departamento',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
