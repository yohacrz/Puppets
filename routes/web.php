<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CitaController as AdminCitaController;
use App\Http\Controllers\Admin\PetController as AdminPetController;

use App\Models\Pet;
use App\Models\Cita;


/*
|--------------------------------------------------------------------------
| Rutas Web
|--------------------------------------------------------------------------
*/

//--- RUTAS PÚBLICAS ---//

// Modifica esta línea
Route::get('/user', function () {
    return view('user.index');
})->name('user.index');

Route::get('/', function () {
    return view('user.index');
})->name('home');

//Route::get('/admin/productos', function () {
  
  //   return view('admin.productos');
//})->name('admin.productos');

// Esta ruta es SOLO para el formulario.
Route::get('/formulario-tienda', function () {
    return view('user.shop'); // Aquí sí usamos tu vista del formulario.
})->name('user.shop');


// Esta ruta es para que la gente VEA los productos.
Route::get('/tienda', [ProductController::class, 'showShop'])->name('tienda.index');


// Ruta para la página del carrito
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

// Ruta para la página de la whishlist
Route::get('/wishlist', function () {
    return view('user.wishlist');
});

// Ruta para la página del blog
Route::get('/blog', function () {
    return view('user.blog');
});

// Ruta para la página de contacto
Route::get('/contact', function () {
    return view('user.contact');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/services/{service}', function ($service) {
    return view('services.detail', ['service' => $service]);
})->name('services.detail');

Route::get('/paquetes', function () {
    return view('packages');
})->name('packages');

Route::get('/account', function () {
    return view('user.account');
});

Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.index');

Route::view('/testimonials', 'partials.testimonials')->name('testimonials');
Route::view('/pricing',      'partials.pricing')->name('pricing');


//--- RUTAS DE AUTENTICACIÓN ---//

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.process');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [RegisterController::class, 'register'])->name('register.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/forgot-password', function () {
    return 'Página de recuperación de contraseña (simulada)';
})->name('password.request');


//--- RUTAS PROTEGIDAS (REQUIEREN LOGIN) ---//

Route::middleware('auth')->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', function () {
        $user = Auth::user();
        $mascotas = Pet::where('user_id', $user->id)->get();
        
        // Obtenemos solo las citas futuras del usuario, ordenadas por la más próxima
        $citas = Cita::where('user_id', $user->id)
                     ->where('fecha', '>=', now())
                     ->orderBy('fecha', 'asc')
                     ->orderBy('hora', 'asc')
                     ->get();

        return view('user.profile', compact('user', 'mascotas', 'citas'));
    })->name('profile');

    // Mascotas
    Route::get('/addPet', function () {
        return view('profile.addPet');
    })->name('addPet');
    Route::post('/addPet', [PetController::class, 'store'])->name('addPet.store');

    // Citas
    Route::get('/agendar-cita/{pet}', [CitaController::class, 'create'])->name('citas.create');
    Route::post('/citas', [CitaController::class, 'store'])->name('citas.store');

});

//--- RUTA DE PRUEBA Y UTILIDADES (Eliminar en producción) ---//
Route::get('/test', function () {
    return 'OK';
});

Route::get('/setup-application-cache', function () {
    try {
        Artisan::call('config:clear');
        Artisan::call('config:cache');
        Artisan::call('route:cache');
        Artisan::call('view:clear');
        return '<h1>¡Comandos Ejecutados!</h1><p>La caché ha sido limpiada y regenerada. <strong>Por favor, elimina este bloque de código de tu archivo web.php ahora mismo.</strong></p>';
    } catch (Exception $e) {
        return '<h1>Error al ejecutar comandos:</h1><pre>' . $e->getMessage() . '</pre>';
    }
});



//--- rutas de controladores ---//  
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/admin', [ProductController::class, 'dashboard'])->name('admin.dashboard');




//--- RUTAS ADMIN ---//

Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// NUEVA RUTA: Para cambiar el estado (Activar/Deshabilitar) de un producto específico.
Route::put('admin/products/{product}/toggle', [ProductController::class, 'toggleEstado'])
    ->name('admin.gestion.productos.toggle_estado');

// Esto crea todas las rutas para la gestión de productos (index, create, store, edit, update, destroy)
Route::resource('admin/products', ProductController::class)->names('admin.gestion.productos');
//------------------------------------
// RUTAS DE EXPORTACIÓN PARA CITAS

    
// RUTA DE EXPORTACIÓN PARA EXCEL (Asegúrate de que esta también use el alias)
Route::get('admin/citas/export/excel', [AdminCitaController::class, 'exportExcel']) // <-- CORRECCIÓN AQUÍ
    ->name('admin.gestion.citas.export.excel');

Route::get('admin/products/export/excel', [ProductController::class, 'exportExcel'])
    ->name('admin.gestion.productos.export.excel');

//------------------------------------------------------------------------------
Route::resource('admin/clients', ClientController::class)->names('admin.gestion.clientes');
Route::resource('admin/citas', AdminCitaController::class)->names('admin.gestion.citas');
Route::resource('admin/mascotas', AdminPetController::class)->names('admin.gestion.mascotas');


//-------------
// NUEVA RUTA: Para actualizar el estado de una cita
Route::put('admin/citas/{cita}/estado', [AdminCitaController::class, 'updateEstado'])
    ->name('admin.gestion.citas.updateEstado');
//-------------
    // NUEVA RUTA: Para cambiar el estado (Activar/Deshabilitar) de un cliente específico.
Route::put('admin/clients/{client}/toggle', [ClientController::class, 'toggleStatus'])
    ->name('admin.gestion.clientes.toggle_status');

//---------------------------------------------------------------------------------

//--- RUTAS PROTEGIDAS (REQUIEREN LOGIN) ---//

Route::middleware('auth')->group(function () {
   
    // Mueve la ruta de usuario aquí
    Route::get('/user', function () {
        return view('user.index');
    })->name('user.index');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});