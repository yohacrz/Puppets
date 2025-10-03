<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Exports\ClientsExport; // 👈 NECESITAS ESTE USE para la exportación
use Maatwebsite\Excel\Facades\Excel; // 👈 NECESITAS ESTE USE para la exportación

class ClientController extends Controller
{
    /**
     * Método para listar todos los clientes (usuarios) y aplicar el filtro.
     */
    public function index(Request $request) // 👈 ACEPTA Request para el filtro
    {
        // 1. Iniciar la consulta, excluyendo administradores (role = 1)
        $query = User::query()->where('role', '!=', 1);

        // 2. Aplicar filtro por estado si existe en la solicitud
        $estado = $request->get('estado');

        if ($estado !== null && in_array($estado, ['0', '1'])) {
            $query->where('estado', $estado);
        }

        // 3. Obtener los clientes (filtrados o todos)
        $clients = $query->get();
        
        // 4. Se necesita 'admin.gestion.clientes.index' en lugar de 'admin.clients'
        return view('admin.gestion.clientes.index', compact('clients'));
    }
// ----------------------------------------------------------------------
    /**
     * Exporta los clientes a un archivo Excel.
     * Aplica el filtro de estado si está presente en la solicitud.
     */
    public function exportExcel(Request $request)
    {
        // Obtener el parámetro de estado de la URL (si existe)
        $estado = $request->get('estado'); 

        // Generar y descargar el archivo Excel, pasando el estado al constructor
        return Excel::download(new ClientsExport($estado), 'clientes_registrados.xlsx');
    }
// ----------------------------------------------------------------------
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
        // Corregido: La lógica correcta de alternancia es:
        $newStatus = $client->estado == 1 ? 0 : 1;

        $client->update(['estado' => $newStatus]); // <-- Usa 'estado'

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
    public function show($id)
    {
        return redirect()->route('admin.gestion.clientes.index');
    }
    public function create()
    {
        return redirect()->route('admin.gestion.clientes.index');
    }
    public function store(Request $request)
    {
        return redirect()->route('admin.gestion.clientes.index');
    }
}