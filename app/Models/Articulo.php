<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    // 1. CRÍTICO: Indica a Eloquent que use la tabla 'products'
    // Si tu tabla fuera 'articulos', esta línea sería opcional, 
    // pero como es 'products', es esencial.
    protected $table = 'products'; 
    
    // Opcional, pero recomendado: Indica qué campos se pueden llenar masivamente (mass assignable).
    // Incluye aquí todas las columnas que modificas con formularios.
    protected $fillable = [
        'categoria',
        'name',
        'description',
        'price',
        'stock',
        'stock_S',
        'stock_M',
        'stock_L',
        'stock_XL',
        'image',
        'estado',
    ];
}