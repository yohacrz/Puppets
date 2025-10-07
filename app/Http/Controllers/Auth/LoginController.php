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
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->role === 1) {
                return redirect()->intended('/admin');
            }

            // CAMBIO CLAVE AQUÍ: 
            // Redirige usando el nombre de la ruta. Esto fuerza a Laravel a 
            // ejecutar completamente el controlador asociado a la ruta.
            return redirect()->intended(route('home')); 
            // O si prefieres la ruta /user: return redirect()->intended(route('user.index'));
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

        return redirect('/'); // Redirige a la página de principal
    }
}