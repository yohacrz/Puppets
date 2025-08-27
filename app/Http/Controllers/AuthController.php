<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Mostrar formulario de registro
    public function showRegister()
    {
        return view('auth.register');
    }

    // Procesar registro real
    public function register(Request $request)
    {
        // 1) Validación de los datos ("name","email","password")
        $data = $request->validate([
            'name'                  => ['required','string','max:200',],
            'email'                 => ['required','email','max:250','unique:Usuarios,Email'],
            'password'              => ['required','string','min:6','max:200','confirmed'],
        ]);

        // 2) Crear el usuario mapeando a las columnas de tu tabla
        $user = Usuario::create([
            'Email'           => $data['email'],
            'Nombre_Usuario'  => $data['name'],
            'Contrasena'      => Hash::make($data['password']),
        ]);

        // 3) Loguear y regenerar sesión
        Auth::login($user);
        $request->session()->regenerate();

        // 4) Redirigir al dashboard
        return redirect()->intended('/dashboard');
    }
}
