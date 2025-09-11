<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cita extends Model
{
    use HasFactory;

    /**
     * La tabla de la base de datos asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'citas';

    /**
     * Los atributos que se pueden asignar masivamente.
     * Esta es una medida de seguridad de Laravel.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'pet_id',
        'fecha',
        'hora',
        'mensaje',
    ];

    /**
     * Define la relación: Una cita pertenece a un usuario (User).
     */
    public function user(): BelongsTo
    {
        // Reemplaza 'App\Models\User' si tu modelo de usuario se llama diferente (ej: 'App\Models\Usuario')
        return $this->belongsTo(User::class);
    }

    /**
     * Define la relación: Una cita pertenece a una mascota (Pet).
     */
    public function pet(): BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }
}