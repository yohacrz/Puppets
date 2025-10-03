<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * * ✅ CRÍTICO: Se han añadido todas las columnas de stock y color.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',       // Stock total
        'stock_S',     // Stock por talla S
        'stock_M',     // Stock por talla M
        'stock_L',     // Stock por talla L
        'stock_XL',    // Stock por talla XL
        'color',       // Columna de color
        'image',
        'estado',
    ];

    /**
     * The attributes that should be cast to native types.
     * * ✅ CRÍTICO: Asegura que el stock se maneje como número entero.
     *
     * @var array
     */
    protected $casts = [
        'price' => 'float',
        'stock' => 'integer', 
        'stock_S' => 'integer', 
        'stock_M' => 'integer',
        'stock_L' => 'integer',
        'stock_XL' => 'integer',
    ];
}