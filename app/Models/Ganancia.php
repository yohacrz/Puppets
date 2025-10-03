<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ganancia extends Model
{
    // Nombre de la tabla
    protected $table = 'ganancias';
    
    // Clave primaria (si no es 'id')
    // protected $primaryKey = 'id'; 
    
    // Desactivamos timestamps si tu tabla no tiene created_at/updated_at
    public $timestamps = false; 

    // Columnas que se pueden asignar masivamente, DEBEN coincidir con tu tabla.
    protected $fillable = [
        'id_products', 
        'cobro', 
        'fecha',
        'pago_id',
        // Si tu tabla tuviera 'cantidad', 'talla', etc., irían aquí.
    ];

    // Aseguramos que 'cobro' se trate como un número
    protected $casts = [
        'cobro' => 'float',
    ];
}