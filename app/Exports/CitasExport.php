<?php

namespace App\Exports;

use App\Models\Cita;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping; // Necesario para mapear las relaciones
use Carbon\Carbon;

class CitasExport implements FromCollection, WithHeadings, WithMapping
{
    protected $estado;

    // Constructor para recibir el parámetro de filtro
    public function __construct($estado = null)
    {
        // Se asegura de que el estado sea un número, o null si está vacío
        $this->estado = is_numeric($estado) ? (int)$estado : null; 
    }

    // Define la colección de datos a exportar, aplicando el filtro
    public function collection()
    {
        $query = Cita::with(['user', 'pet']);

        if ($this->estado !== null) {
            $query->where('estado', $this->estado);
        }

        return $query->orderBy('fecha', 'desc')->get();
    }
    
    // Mapea los datos de la cita a las columnas de Excel
    public function map($cita): array
    {
        $estadosTexto = [
            1 => 'Pendiente',
            0 => 'Completada',
            2 => 'Cancelada',
            3 => 'En Proceso',
        ];
        
        return [
            $cita->id,
            $cita->user->username ?? 'Usuario no encontrado',
            $cita->pet->nombre ?? 'Mascota no encontrada',
            Carbon::parse($cita->fecha)->format('d/m/Y'),
            $cita->hora,
            $cita->mensaje,
            $estadosTexto[$cita->estado] ?? 'Desconocido',
        ];
    }

    // Encabezados del archivo Excel
    public function headings(): array
    {
        return [
            'ID Cita',
            'Dueño (Username)',
            'Mascota',
            'Fecha',
            'Hora',
            'Descripción',
            'Estado',
        ];
    }
}