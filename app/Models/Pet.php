<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pet extends Model
{
    use HasFactory;

    /**
     * La tabla de la base de datos asociada con el modelo.
     * Es buena práctica definirla explícitamente.
     */
    protected $table = 'pets';

    /**
     * Los atributos que se pueden asignar masivamente.
     * ¡MUY IMPORTANTE! Esta es una lista de permisos que indica qué campos
     * se pueden rellenar automáticamente desde un formulario.
     */
    protected $fillable = [
        'user_id',
        'especie',
        'raza',
        'nombre',
        'color',
        'fecha_nacimiento',
    ];

    /**
     * Define la relación: Una mascota pertenece a un usuario (User).
     * Esto nos permitirá obtener el dueño de la mascota fácilmente.
     */
    public function user(): BelongsTo
    {
        // Si tu modelo de usuario se llama 'Usuario', cambia User::class por Usuario::class
        return $this->belongsTo(User::class);
    }

    /**
     * Define la relación: Una mascota puede tener muchas citas (Cita).
     * Esto nos permitirá obtener todas las citas de una mascota.
     */
    public function citas(): HasMany
    {
        return $this->hasMany(Cita::class);
    }

    
}