<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Usuario extends Model implements Authenticatable
{
    use AuthenticableTrait;

    protected $table = 'Usuarios'; // Nombre exacto de la tabla
    protected $primaryKey = 'Id';  // Clave primaria personalizada

    public $timestamps = false; // Si tu tabla no tiene created_at y updated_at

    protected $fillable = [
        'Email',
        'Nombre_Usuario',
        'Contrasena',
    ];

    protected $hidden = [
        'Contrasena',
    ];

    public function getAuthPassword()
    {
        return $this->Contrasena;
    }
}
