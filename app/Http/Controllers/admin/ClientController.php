<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ClientController extends Controller
{
    // Método para listar todos los clientes (usuarios)
    public function index()
    {
        $clients = User::all(); 
        return view('admin.gestion.clientes.index', compact('clients'));
    }
    
    /**
     * Muestra el formulario para editar el cliente.
     * ESTE MÉTODO FALTABA.
     */
    public function edit(User $client)
    {
        // Regla de seguridad: Si intentan editar a un administrador, redirigimos inmediatamente.
        if ($client->role == 1) {
            return redirect()->route('admin.gestion.clientes.index')
                             ->with('error', 'ERROR: Acceso denegado. No se puede editar la información del Administrador.');
        }

        // Carga la vista de edición si el rol NO es administrador.
        return view('admin.gestion.clientes.edit', compact('client'));
    }
    
    // Procesa la actualización de datos (desde el formulario edit)
    public function update(Request $request, User $client) 
    { 
        // PASO 1: REGLA DE SEGURIDAD. Bloquear la edición si es administrador.
        if ($client->role == 1) {
            return redirect()->route('admin.gestion.clientes.index')
                             ->with('error', 'ERROR: No se permite editar la información del Administrador por seguridad.');
        }

        // PASO 2: Validar los datos de entrada
        $validated = $request->validate([
            'email' => 'required|email|max:255|unique:users,email,' . $client->id, 
            'username' => 'required|string|max:255|unique:users,username,' . $client->id,
        ]);
        
        // PASO 3: Actualizar el cliente
        $client->update($validated);
        
        return redirect()->route('admin.gestion.clientes.index')
                         ->with('success', 'Cliente ' . $client->username . ' actualizado exitosamente!');
    }
    
    /**
     * Alterna el estado (status) del cliente entre 1 (activo) y 0 (desactivado).
     */
    public function toggleStatus(User $client)
    {
        // [CORRECCIÓN] Aseguramos usar el campo 'status' en lugar de 'estado' si ese es el campo de la BD
        // Si tu campo en la BD es 'estado', mantén 'estado'. Si es 'status', corrígelo. Usaremos 'status' por convención.
        $newStatus = $client->status == 1 ? 0 : 1;
        
        $client->update(['status' => $newStatus]); // <-- Usa 'status' o 'estado' según tu DB

        $mensaje = $newStatus == 1 
            ? 'Cliente activado exitosamente.' 
            : 'Cliente desactivado exitosamente.';

        return redirect()->back()->with('success', $mensaje);
    }
    
    // Procesa la eliminación
    public function destroy(User $client)
    {
        $client->delete();
        return redirect()->back()->with('success', 'Cliente eliminado permanentemente.');
    }

    // Métodos mínimos para Route::resource (sin implementación):
    public function show($id) { return redirect()->route('admin.gestion.clientes.index'); }
    public function create() { return redirect()->route('admin.gestion.clientes.index'); }
    public function store(Request $request) { return redirect()->route('admin.gestion.clientes.index'); }
}