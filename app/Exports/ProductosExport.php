<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductosExport implements FromCollection, WithHeadings
{
    // Define los encabezados del archivo Excel
    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Descripción',
            'Precio',
            'Stock',
            'Estado (1=Activo, 0=Inactivo)',
            // ... otros campos
        ];
    }

    // Define los datos que se van a exportar
    public function collection()
    {
        // NO APLICAMOS FILTRO AQUÍ, solo traemos todos los productos.
        return Product::all([
            'id', 
            'name', 
            'description', 
            'price', 
            'stock', 
            'estado',
            // ... selecciona solo los campos que quieres en el mismo orden que headings()
        ]);
    }
}