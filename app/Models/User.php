<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'primer_nombre_usuario',
        'segundo_nombre_usuario',
        'primer_apellido_usuario',
        'segundo_apellido_usuario',
        'documento_usuario',
        'email',
        'rol',
        'roleName',
        'password',
        'departamento_id',
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
    
    public function firmas()
    {
        return $this->hasMany(Firma::class);
    }
    
    public function documentos()
    {
        return $this->belongsToMany(Documento::class, 'usuarios_por_documentos')->withPivot('firma_id', 'condicion', 'aprobacion');
        
    }

    public function documentosSolicitante()
    {
        return $this->belongsToMany(Documento::class, 'usuarios_por_documentos')->withPivot('firma_id', 'condicion', 'aprobacion')->wherePivot('condicion', 'solicitante');
    }

    public function documentosRevisor()
    {
        return $this->belongsToMany(Documento::class, 'usuarios_por_documentos')->withPivot('firma_id', 'condicion', 'aprobacion')->wherePivot('condicion', 'revisor');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
