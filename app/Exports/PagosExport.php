<?php

namespace App\Exports;

use App\Models\Pago;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PagosExport implements FromCollection, WithHeadings, WithMapping
{
    protected $estado;

    public function __construct($estado = null)
    {
        $this->estado = $estado;
    }

    /**
    * Define los encabezados (columnas) del archivo Excel.
    * @return array
    */
    public function headings(): array
    {
        return [
            'ID Orden',
            'Comprador (Username)',
            'Total',
            'Fecha y Hora',
            'Estado',
            'Detalle de Items',
        ];
    }

    /**
    * Define cómo mapear cada fila de datos a las columnas del Excel.
    * @param Pago $pago
    * @return array
    */
    public function map($pago): array
{
    // 0 = Completado, 1 = Pendiente
    $estado_texto = ($pago->estado == 1) ? 'PENDIENTE' : 'COMPLETADO';
    $comprador = $pago->user->username ?? 'Invitado';

    // 1. Acceder a la propiedad ya decodificada por el modelo (es un array de arrays o strings)
    $items_data = collect($pago->productos); 
    
    // 2. Procesar los items para un mejor detalle
    $items_list = $items_data->map(function ($item) {
        
        // 🚨 CORRECCIÓN CLAVE: Si el item es un string, lo decodificamos a un array.
        // Si no es un string (ya es array/objeto), usamos el valor tal cual.
        $item_array = is_string($item) ? json_decode($item, true) : $item;
        
        // Verificamos que sea un array antes de acceder a las claves para evitar errores.
        if (is_array($item_array) && isset($item_array['name']) && isset($item_array['quantity'])) {
            return "{$item_array['name']} (x{$item_array['quantity']})";
        }
        
        return "Item Desconocido";

    })->implode('; ');

    return [
        $pago->id,
        $comprador,
        number_format($pago->total, 2) . '$',
        \Carbon\Carbon::parse($pago->fecha_hora)->format('d/m/Y H:i A'),
        $estado_texto,
        $items_list, // <-- Ahora contiene la lista de items procesados.
    ];
}

    /**
    * Define los datos que se van a exportar, aplicando el filtro si existe.
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $query = Pago::with('user')->orderBy('fecha_hora', 'desc');

        // Aplicar filtro por estado si se ha proporcionado
        if ($this->estado !== null && in_array($this->estado, ['0', '1'])) {
            $query->where('estado', $this->estado);
        }

        return $query->get();
    }
}