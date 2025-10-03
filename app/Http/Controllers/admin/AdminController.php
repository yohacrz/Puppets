<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Pet;     
use App\Models\Pago;    
use App\Models\Ganancia; 
use App\Models\Cita;     // 👈 NECESARIO: Para citas
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        // ===============================================
        // 1. WIDGETS SUPERIORES (3 METRICAS CLAVE)
        // ===============================================
        
        // Clientes Registrados (asumiendo role = 0)
        $totalClients = User::where('role', 0)->count();

        // Mascotas Registradas
        $mascotasRegistradas = Pet::count();
        
        // Productos Activos (asumiendo estado = 1 es activo en la tabla 'products')
        $productosActivos = Product::where('estado', 1)->count();


        // ===============================================
        // 2. DATOS PARA GRÁFICOS (Chart.js)
        // ===============================================

        // A. Ganancias Totales (Total Ganado) y Stock Mínimo (Tabla)
        $totalIngresos = Ganancia::sum('cobro'); // Usado en el título del gráfico, no en el data
        
        $stockData = Product::orderBy('stock', 'asc')
            ->select('name', 'stock')
            ->take(5)
            ->get();
            
        // B. Clasificación de Mascotas por Raza
        $razasData = Pet::select('raza', DB::raw('count(*) as count'))
            ->groupBy('raza')
            ->orderBy('count', 'desc')
            ->get();
            
        // C. Pedidos Clasificados por Estado (Pendiente/Completado)
        $pedidosEstadoData = Pago::select('estado', DB::raw('count(*) as count'))
            ->groupBy('estado')
            ->get();
            
        // D. Citas Clasificadas por Estado (0=Completada, 1=Pendiente, 2=Cancelada, 3=En Proceso)
        $citasEstadoData = Cita::select('estado', DB::raw('count(*) as count'))
            ->groupBy('estado')
            ->get();
        
        // E. Tendencia de Ingresos Mensuales (para una gráfica de línea)
        $ingresosPorMes = Ganancia::select(
            DB::raw('MONTH(fecha) as month'), 
            DB::raw('SUM(cobro) as total')
        )
        ->groupBy('month')
        ->orderBy('month', 'asc')
        ->get();


        return view('admin.index', compact(
            'totalClients',
            'mascotasRegistradas',
            'productosActivos',
            'totalIngresos', // Total de ingresos para el título
            'stockData',     // Tabla de Stock Bajo
            'razasData',
            'pedidosEstadoData',
            'citasEstadoData',
            'ingresosPorMes'
        ));
    }
}