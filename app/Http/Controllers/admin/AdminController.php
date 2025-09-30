<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // Asegúrate de importar el modelo Product
use App\Models\User;    // Asegúrate de importar el modelo User

class AdminController extends Controller
{
    public function dashboard()
    {
        // Conteo de productos
        $totalProducts = Product::count();
        
        // Conteo de usuarios registrados con role igual a 0
        $totalClients = User::where('role', 0)->count();
        
        return view('admin.index', compact('totalProducts', 'totalClients'));
    }
}