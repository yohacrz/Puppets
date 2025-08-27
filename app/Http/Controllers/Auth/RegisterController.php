<?php

use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:Usuarios,Email',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $usuario = Usuario::create([
        'Nombre_Usuario' => $request->name,
        'Email' => $request->email,
        'Contrasena' => Hash::make($request->password),
    ]);

    // Si quieres iniciar sesión automáticamente:
    // Auth::login($usuario); ← solo si configuras el guard personalizado

    return redirect()->route('home')->with('success', 'Usuario registrado correctamente');
}

