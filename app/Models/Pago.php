<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pago extends Model
{
    // Define el nombre de la tabla
    protected $table = 'pagos';

    // 1. CLAVE PRIMARIA: Indica que la columna 'id' es la clave principal.
    protected $primaryKey = 'id';
    
    // 2. TIMESTAMPS: Tu tabla NO tiene created_at/updated_at, así que los desactivamos.
    public $timestamps = false; 

    /**
     * The attributes that are mass assignable.
     * Estas columnas coinciden con tu tabla 'pagos' en la base de datos (id_user, productos, total, fecha_hora, estado).
     */
    protected $fillable = [
        'id_user',      // ID del usuario comprador
        'productos',    // JSON de la lista de productos del carrito
        'total',        // Monto total de la orden
        'fecha_hora',   // Fecha y hora de la creación del ticket
        'estado',       // Estado de la orden (0=Pendiente, 1=Completado)
    ];
    
    // 3. CASTING: Asegura que el campo de productos se maneje como un array/objeto PHP.
    protected $casts = [
        'productos' => 'array',
    ];


    /**
     * Define la relación con el modelo User (asumiendo que User::class existe).
     * Esto te permite obtener el nombre del comprador ($pago->user->name).
     */
    public function user(): BelongsTo
    {
        // Asume que la clave foránea en `pagos` es 'id_user' y apunta a la 'id' de la tabla 'users'
        return $this->belongsTo(User::class, 'id_user');
    }
}