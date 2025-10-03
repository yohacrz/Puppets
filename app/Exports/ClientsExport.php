<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ClientsExport implements FromCollection, WithHeadings, WithMapping
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
            'ID',
            'Nombre de Usuario',
            'Email',
            'Rol',
            'Estado',
            'Fecha de Registro',
        ];
    }

    /**
    * Define cómo mapear cada fila de datos a las columnas del Excel.
    * Esto nos permite formatear los datos (ej: el Rol y el Estado de número a texto).
    * @param mixed $client
    * @return array
    */
    public function map($client): array
    {
        // Convertir Rol de número a texto
        $rol = ($client->role == 1) ? 'ADMINISTRADOR' : 'CLIENTE';
        
        // Convertir Estado de número a texto
        $estado = ($client->estado == 1) ? 'ACTIVO' : 'DESACTIVADO';

        return [
            $client->id,
            $client->username,
            $client->email,
            $rol,
            $estado,
            $client->created_at->format('d/m/Y H:i'),
        ];
    }

    /**
    * Define los datos que se van a exportar, aplicando el filtro si existe.
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $query = User::query()
            // Excluimos administradores de la exportación si es necesario, o solo usuarios con rol de cliente (ej: role != 1)
            ->where('role', '!=', 1) 
            ->orderBy('id', 'asc');

        // Aplicar filtro por estado si se ha proporcionado
        // Aseguramos que el estado es un valor válido (0 o 1) y no vacío
        if ($this->estado !== null && in_array($this->estado, ['0', '1'])) {
            $query->where('estado', $this->estado);
        }

        // Selecciona las columnas necesarias para el mapeo, no es necesario seleccionar todas las columnas si usamos WithMapping
        return $query->get();
    }
}