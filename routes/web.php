<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.delete');
    Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
    Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
});


