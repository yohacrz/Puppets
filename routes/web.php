<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
// --- Agregado: Importar controlador de Auth
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;

// --- Agregado: Importar Artisan para la ruta temporal ---
use Illuminate\Support\Facades\Artisan;


Route::get('/test', function () {
    return 'OK';
});

// Página de inicio
Route::get('/', function () {
    return view('welcome');
});

// Página "about"
Route::get('/about', function () {
    return view('about');
});

// Página "services"
Route::get('/services', function () {
    return view('services');
});

// Detalle de cada servicio
Route::get('/services/{service}', function ($service) {
    return view('services.detail', ['service' => $service]);
})->name('services.detail');

// Página de login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Página de registro
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Página de recuperación de contraseña
Route::get('/forgot-password', function () {
    return 'Página de recuperación de contraseña (simulada)';
})->name('password.request');

// Opcional: páginas independientes para testimonios y pricing (si quieres)
Route::view('/testimonials', 'partials.testimonials')->name('testimonials');
Route::view('/pricing',      'partials.pricing')->name('pricing');


// ————————————————————————————————————————————————————————
// AÑADE ESTO AL FINAL PARA AUTENTICACIÓN REAL
// ————————————————————————————————————————————————————————

Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// --- CÓDIGO TEMPORAL AÑADIDO ---
// !! ESTE BLOQUE SE DEBE ELIMINAR DESPUÉS DE USAR !!
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

use Illuminate\Support\Facades\DB;

Route::get('/db-test', function () {
    try {
        DB::connection()->getPdo();
        return 'Conexión a MySQL exitosa!';
    } catch (\Exception $e) {
        return 'Error en conexión: ' . $e->getMessage();
    }
});
