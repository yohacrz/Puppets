<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'stock_S',
        'stock_M',
        'stock_L',
        'stock_XL',
        'color',
        // ✅ CRÍTICO: 'categoria' DEBE estar aquí.
        'categoria',
        'image',
        'estado',
    ];

    protected $casts = [
        'price' => 'float',
        'stock' => 'integer', 
        'stock_S' => 'integer', 
        'stock_M' => 'integer',
        'stock_L' => 'integer',
        'stock_XL' => 'integer',
    ];
}