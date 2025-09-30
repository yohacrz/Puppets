<?php

namespace App\Http\Controllers\Admin;
// Mover TODOS los USE statements aquí, justo después del namespace
use Maatwebsite\Excel\Facades\Excel; 
use App\Exports\CitasExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cita;
use Carbon\Carbon; // Se usa para formateo de fechas y nombres de archivo


class CitaController extends Controller
{
    // Método para listar todas las citas con funcionalidad de filtro
    public function index(Request $request) // <-- INYECTAMOS Request
    {
        // 1. Iniciar la consulta, cargando las relaciones
        $query = Cita::with(['user', 'pet']);
        
        // 2. Aplicar el filtro si se recibe el parámetro 'estado'
        if ($request->filled('estado') && $request->estado !== null) {
            // Utilizamos where para filtrar las citas con el estado proporcionado
            $query->where('estado', $request->estado);
        }
        
        // 3. Obtener los resultados ordenados
        $citas = $query->orderBy('fecha', 'desc')
                       ->orderBy('hora', 'desc')
                       ->get(); 
        
        // Llama a la vista: resources/views/admin/gestion/citas/index.blade.php
        return view('admin.gestion.citas.index', compact('citas'));



        $query = Cita::with(['user', 'pet']);
        
        if ($request->filled('estado') && $request->estado !== null) {
            $query->where('estado', $request->estado);
        }
        
        $citas = $query->orderBy('fecha', 'desc')
                       ->orderBy('hora', 'desc')
                       ->get(); 
        
        return view('admin.gestion.citas.index', compact('citas'));
    }
    
    // Método para mostrar el formulario de edición (necesario por Route::resource)
    public function edit(Cita $cita)
    {
        return view('admin.gestion.citas.edit', compact('cita'));
    }

    // NUEVO MÉTODO: Actualizar el estado de la cita
    public function updateEstado(Request $request, Cita $cita)
    {
        // 1. Validar que se haya seleccionado un estado válido
        $request->validate([
            'estado' => 'required|integer|in:0,1,2,3',
        ]);

        // 2. Mapeo de estados para el mensaje de éxito
        $estadosTexto = [
            1 => 'Pendiente',
            0 => 'Completada',
            2 => 'Cancelada',
            3 => 'En Proceso',
        ];
        
        // 3. Actualizar el estado
        $cita->update([
            'estado' => $request->estado
        ]);

        $mensaje = 'El estado de la cita ID ' . $cita->id . ' se ha actualizado a: ' . $estadosTexto[$request->estado] . '.';

        return redirect()->back()->with('success', $mensaje);
    }
    
    // Métodos RESTful mínimos para Route::resource:

    // Muestra una cita (sin implementación, redirige a index)
    public function show($id) 
    { 
        return redirect()->route('admin.gestion.citas.index'); 
    }

    // Muestra el formulario de creación (sin implementación, redirige a index)
    public function create() 
    { 
        return redirect()->route('admin.gestion.citas.index'); 
    }

    // Procesa la creación (sin implementación, redirige a index)
    public function store(Request $request) 
    { 
        return redirect()->route('admin.gestion.citas.index'); 
    }

    // Procesa la actualización (AJUSTADO para usar Route Model Binding)
    public function update(Request $request, Cita $cita) 
    { 
        // Si no tienes una lógica completa de edición, puedes redirigir:
        // return redirect()->route('admin.gestion.citas.index'); 
        
        // Si necesitas validar y guardar los datos del formulario 'edit'
        $cita->update($request->all()); // <-- Usa una lógica real aquí
        return redirect()->route('admin.gestion.citas.index')->with('success', 'Cita actualizada desde el formulario de edición.');
    }

    // Procesa la eliminación (AJUSTADO para usar Route Model Binding)
    public function destroy(Cita $cita) 
    { 
        $cita->delete();
        return redirect()->back()->with('success', 'Cita eliminada correctamente.'); 
    }


     public function exportExcel(Request $request)
    {
        $estado = $request->input('estado');
        
        $estadoNombre = match((int) $estado) {
            0 => 'completadas',
            1 => 'pendientes',
            2 => 'canceladas',
            3 => 'en_proceso',
            default => 'todas',
        };
        
        $filename = 'citas_' . $estadoNombre . '_' . now()->format('Ymd') . '.xlsx';
        
        return Excel::download(new CitasExport($estado), $filename);
    }

    /**
     * Exporta las citas filtradas a un archivo PDF.
     */
    

}