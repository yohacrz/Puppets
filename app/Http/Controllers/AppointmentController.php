<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function create()
    {
        // Este método ahora puede acceder a los datos del paquete desde la sesión
        $paqueteSeleccionado = session('paquete_seleccionado', null);

        // Pasamos los datos del paquete a la vista si existen
        return view('agendar-cita', [
            'paqueteSeleccionado' => $paqueteSeleccionado
        ]);
    }

    public function store(Request $request)
    {
        // 1. Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
            'mascota' => 'required|string',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'mensaje' => 'nullable|string',
            // Asegúrate de validar los nuevos campos
            'servicio_seleccionado' => 'nullable|string',
            'tamanio_seleccionado' => 'nullable|string',
            'precio_seleccionado' => 'nullable|numeric',
        ]);
    
        // 2. Guardar los datos en la base de datos
        Appointment::create([
            'full_name' => $request->nombre,
            'email' => $request->email,
            'phone' => $request->telefono,
            'pet_type' => $request->mascota,
            'appointment_date' => $request->fecha,
            'appointment_time' => $request->hora,
            'message' => $request->mensaje,
            'servicio_seleccionado' => $request->servicio_seleccionado,
            'tamanio_seleccionado' => $request->tamanio_seleccionado,
            'precio_seleccionado' => $request->precio_seleccionado,
        ]);
    
        // 3. Limpiar los datos del paquete de la sesión después de guardar
        $request->session()->forget('paquete_seleccionado');
    
        // 4. Redirigir de vuelta con un mensaje de éxito
        return back()->with('success', 'Tu cita ha sido agendada y guardada con éxito.');
    }

    public function seleccionarPaquete(Request $request)
    {
        // Guardamos los datos del paquete en la sesión
        $request->session()->put('paquete_seleccionado', [
            'servicio' => $request->input('servicio'),
            'tamanio' => $request->input('tamanio'),
            'precio' => $request->input('precio'),
        ]);

        // Redirigimos al usuario al formulario de agendar cita
        // Ahora, la URL no mostrará los datos del paquete.
        return redirect()->route('agendar.cita.create');
    }
}