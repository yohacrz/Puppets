<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AppointmentController; // Asegúrate de que esta línea esté presente
use App\Http\Controllers\PetController;
use App\Models\Pet;

// --- Agregado: Importar Artisan para la ruta temporal ---
use Illuminate\Support\Facades\Artisan;


Route::get('/paquetes', function () {
    return view('packages');
})->name('packages');

Route::get('/agendar-cita', function () {
    return view('agendar-cita');
});



// Ruta para procesar la selección del paquete y redirigir
Route::get('/agendar-cita/seleccionar-paquete', [AppointmentController::class, 'seleccionarPaquete'])->name('agendar.cita.seleccionar');

// Ruta del formulario de agendar cita (mantén esta ruta como está)
Route::get('/agendar-cita', [AppointmentController::class, 'create'])->name('agendar.cita.create');

// Ruta para guardar la cita (mantén esta ruta como está)
Route::post('/agendar-cita', [AppointmentController::class, 'store'])->name('agendar.cita.store');



Route::get('/test', function () {
    return 'OK';
});

// Página de inicio
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Página "about"
Route::get('/about', function () {
    return view('about');
});

// Página "services"
Route::get('/services', function () {
    return view('services');
});

Route::get('/user', function () {
    return view('user.index');
});

// Define una ruta GET que responda a la URL /admin
Route::get('/admin', function () {
    return view('admin.index');})->name('admin.index');



    

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


Route::middleware('auth')->get('/profile', function () {
    $user = Auth::user();
    $mascotas = Pet::where('user_id', $user->id)->get();
    return view('profile.profile', compact('user', 'mascotas'));
})->name('profile');


// Página de registro
Route::middleware('auth')->get('/addPet', function () {
    return view('profile.addPet');
})->name('addPet');





// Opcional: páginas independientes para testimonios y pricing (si quieres)
Route::view('/testimonials', 'partials.testimonials')->name('testimonials');
Route::view('/pricing',      'partials.pricing')->name('pricing');


// ————————————————————————————————————————————————————————
// AÑADE ESTO AL FINAL PARA AUTENTICACIÓN REAL
// ————————————————————————————————————————————————————————

Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::post('/register', [RegisterController::class, 'register'])->name('register.process');
//Route::post('/register', [AuthController::class, 'register'])->name('register.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware('auth')->post('/addPet', [PetController::class, 'store'])->name('addPet.store');

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