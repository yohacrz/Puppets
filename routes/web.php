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
use App\Models\Pet;
use App\Models\Cita;

/*
|--------------------------------------------------------------------------
| Rutas Web
|--------------------------------------------------------------------------
*/

//--- RUTAS PÚBLICAS ---//

Route::get('/', function () {
    return view('welcome');
})->name('home');

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

Route::get('/user', function () {
    return view('user.index');
});

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