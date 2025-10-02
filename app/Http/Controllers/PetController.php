<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class PetController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'especie' => 'required|string',
        'raza' => 'required|string',
        'nombre' => [
            'required',
            'string',
            Rule::unique('pets')->where(function ($query) {
                return $query->where('user_id', Auth::id());
            }),
        ],
        'color' => 'required|string',
        'fecha_nacimiento' => 'required|date',
    ]);

    Pet::create([
        'user_id' => Auth::id(),
        'especie' => $request->especie,
        'raza' => $request->raza,
        'nombre' => $request->nombre,
        'color' => $request->color,
        'fecha_nacimiento' => $request->fecha_nacimiento,
    ]);

    return redirect()->route('profile')->with('success', 'Mascota registrada correctamente.');
}


public function destroy($id)
{
    $mascota = Pet::findOrFail($id);
    $mascota->delete();

    return redirect()->back()->with('success', 'Mascota eliminada correctamente.');
}


}
