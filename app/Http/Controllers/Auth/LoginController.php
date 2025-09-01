<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validar los datos del formulario
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Regenerar la sesión por seguridad
            $request->session()->regenerate();

            // Redirigir al dashboard o página principal
            //return redirect()->intended('home');
            return redirect('/');
        }

        // Si falla, regresar con error
        return back()->withErrors([
            'email' => 'Las credenciales no son válidas.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
{
    Auth::logout(); // Cierra la sesión del usuario

    $request->session()->invalidate(); // Invalida la sesión actual
    $request->session()->regenerateToken(); // Regenera el token CSRF

    return redirect('login'); // Redirige a la página principal o donde tú prefieras
}
}