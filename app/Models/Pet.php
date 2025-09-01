<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'user_id',
        'especie',
        'raza',
        'nombre',
        'color',
        'fecha_nacimiento',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
