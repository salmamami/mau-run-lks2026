<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\EventController as PublicEventController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PesertaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::resource('/admin/events', EventController::class);

});

Route::middleware(['auth', 'role:peserta'])->group(function () {

    Route::get('/peserta/dashboard', [PesertaController::class, 'dashboard'])
    ->name('peserta.dashboard');

});

Route::get('/event/{id}', [PublicEventController::class, 'show'])
    ->name('event.detail');

Route::middleware(['auth', 'role:peserta'])->group(function () {

    Route::get(
        '/event/{id}/register',
        [RegistrationController::class, 'create']
    )->name('registration.create');

    Route::post(
        '/event/{id}/register',
        [RegistrationController::class, 'store']
    )->name('registration.store');

});

Route::middleware('auth')->group(function () {

    Route::get('/registration/{id}', [RegistrationController::class, 'show'])
        ->name('registration.show');

    Route::get('/registrations', [App\Http\Controllers\Admin\RegistrationController::class, 'index'])
       ->name('admin.registrations.index');

    Route::patch('/registrations/{registration}/confirm', [App\Http\Controllers\Admin\RegistrationController::class, 'confirm'])
       ->name('admin.registrations.confirm');

    Route::patch('/registrations/{registration}/reject', [App\Http\Controllers\Admin\RegistrationController::class, 'reject'])
       ->name('admin.registrations.reject');

});

Route::get(
    '/registrations/{registration}',
    [App\Http\Controllers\Admin\RegistrationController::class, 'show']
)->name('admin.registrations.show');

Route::get(
    '/admin/events/{event}',
    [EventController::class, 'show']
)->name('events.show');

Route::get(
    '/admin/pesertas',
    [App\Http\Controllers\Admin\PesertaController::class,'index']
)->name('admin.pesertas.index');

Route::get(
    '/admin/pesertas/{peserta}',
    [App\Http\Controllers\Admin\PesertaController::class,'show']
)->name('admin.pesertas.show');