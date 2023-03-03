<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Cabecera extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'cuerpo_cabecera',
        'img_path',
    ];
    
    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }
}
