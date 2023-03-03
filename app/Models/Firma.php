<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Firma extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'img_path',
        'user_id',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
