<?php

namespace App\Exports;

use App\Models\Pet; // Asegúrate de que el modelo Pet está aquí
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PetsExport implements FromCollection, WithHeadings, WithMapping
{
    protected $especie;

    public function __construct($especie = null)
    {
        // Guardamos el filtro de especie
        $this->especie = $especie;
    }

    /**
    * Define los encabezados (columnas) del archivo Excel.
    * @return array
    */
    public function headings(): array
    {
        return [
            'ID Mascota',
            'Nombre',
            'Especie',
            'Raza',
            'Dueño (Username)',
            'Fecha de Registro',
        ];
    }

    /**
    * Define cómo mapear cada fila de datos a las columnas del Excel.
    * @param Pet $mascota
    * @return array
    */
    public function map($mascota): array
    {
        return [
            $mascota->id,
            $mascota->nombre,
            $mascota->especie,
            $mascota->raza,
            $mascota->user->username ?? 'N/A',
            $mascota->created_at->format('d/m/Y'),
        ];
    }

    

    /**
    * Define los datos que se van a exportar, aplicando el filtro si existe.
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $query = Pet::with('user')->orderBy('created_at', 'desc');

        // Aplicar filtro por especie si se ha proporcionado
        if (!empty($this->especie)) {
            // Usamos 'like' para buscar coincidencias parciales, y 'trim' para limpiar espacios
            $query->where('especie', 'like', '%' . trim($this->especie) . '%');
        }

        return $query->get();
    }
}