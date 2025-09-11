<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Cita;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CitaController extends Controller
{
    /**
     * Muestra el formulario para agendar una nueva cita para una mascota específica.
     */
    public function create(Pet $pet): View
    {
        // Seguridad: Verifica que la mascota pertenezca al usuario autenticado.
        if ($pet->user_id !== Auth::id()) {
            abort(403, 'Acción no autorizada.');
        }

        // Retorna la vista 'user.agendar' pasándole la información de la mascota.
        return view('user.agendar', compact('pet'));
    }

    /**
     * Guarda la nueva cita en la base de datos.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validación de los datos del formulario.
        $validatedData = $request->validate([
            'pet_id' => [
                'required',
                Rule::exists('pets', 'id')->where('user_id', Auth::id())
            ],
            'fecha' => ['required', 'date', 'after_or_equal:today'],
            'hora' => ['required', 'date_format:H:i', 'after_or_equal:07:00', 'before_or_equal:17:00'],
            'mensaje' => ['nullable', 'string', 'max:255'],
        ]);

        // Creación de la cita con los datos validados.
        Cita::create([
            'user_id' => Auth::id(),
            'pet_id' => $validatedData['pet_id'],
            'fecha' => $validatedData['fecha'],
            'hora' => $validatedData['hora'],
            'mensaje' => $validatedData['mensaje'],
        ]);

        // Redirección al perfil con un mensaje de éxito.
        return redirect()->route('profile')->with('success', '¡Cita agendada con éxito!');
    }
}