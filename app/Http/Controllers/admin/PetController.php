<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet; // Asumiendo que tienes un modelo Pet

class PetController extends Controller
{
    // Método para listar todas las mascotas
    public function index()
    {
        // Cargamos la relación 'user' (el dueño) para mostrar el username en la vista
        $pets = Pet::with('user')->get(); 
        
        // La vista será 'admin.gestion.mascotas.index'
        return view('admin.gestion.mascotas.index', compact('pets'));
    }
    
    // ... puedes añadir otros métodos CRUD (show, edit, update, destroy) aquí
    // Los dejamos vacíos por simplicidad para evitar errores de Class Not Found
    public function show($id) { return redirect()->route('admin.gestion.mascotas.index'); }
    public function create() { return view('admin.gestion.mascotas.create'); }
    public function store(Request $request) { /* lógica de guardado */ }
    public function edit(Pet $pet) { return view('admin.gestion.mascotas.edit', compact('pet')); }
    public function update(Request $request, $id) { /* lógica de actualización */ }
    public function destroy($id) { return redirect()->back(); }
}