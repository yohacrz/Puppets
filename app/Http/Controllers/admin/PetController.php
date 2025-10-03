<?php

namespace App\Http\Controllers\Admin; // <-- ¡ESTE ES TU NAMESPACE!

use App\Http\Controllers\Controller;
use App\Models\Pet; 
use Illuminate\Http\Request; 
use App\Exports\PetsExport; 
use Maatwebsite\Excel\Facades\Excel; 

class PetController extends Controller
{
    /**
     * Muestra la tabla con todas las mascotas registradas y aplica el filtro.
     */
    public function index(Request $request) 
    {
        $query = Pet::with('user')->orderBy('created_at', 'desc');

        $especie = $request->get('especie');
        if (!empty($especie)) {
            $query->where('especie', 'like', '%' . trim($especie) . '%');
        }

        $mascotas = $query->get();

        return view('admin.gestion.mascotas.index', compact('mascotas'));
    }

    /**
     * Exporta las mascotas a un archivo Excel.
     */
    public function exportExcel(Request $request) // <-- ¡DEBE EXISTIR!
    {
        $especie = $request->get('especie'); 

        return Excel::download(new PetsExport($especie), 'mascotas_registradas.xlsx');
    }

    /* El resto de métodos... */
    public function create() { return redirect()->route('admin.gestion.mascotas.index'); }
    public function store() { /* Lógica futura aquí */ }
    public function show(Pet $pet) { return redirect()->route('admin.gestion.mascotas.index'); }
    public function edit(Pet $pet) { /* Lógica futura aquí */ }
    public function update(Pet $pet) { /* Lógica futura aquí */ }
    public function destroy(Pet $pet) { /* Lógica futura aquí */ }
}