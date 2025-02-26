<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassagerController;
use App\Http\Controllers\ChauffeurController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/trajets', [TrajetController::class, 'index']);
    Route::post('/trajets', [TrajetController::class, 'store']);
    Route::post('/reservations', [ReservationController::class, 'store']);
    Route::get('/notifications', [NotificationController::class, 'index']);
    Route::get('/chauffeur/dashboard', [ChauffeurController::class, 'index'])->name('chauffeur.dashboard');
    Route::get('/passager/dashboard', [PassagerController::class, 'index'])->name('passager.dashboard');
    // route pour acceder au reservations d'une passager lui meme
    Route::get('/passager/reservations', [PassagerController::class, 'reservations'])->name('passager.mesreservation');
    Route::post('/passager/annuler-reservation', [PassagerController::class, 'annulerReservation'])->name('passager.annuler-reservation');

});

require __DIR__.'/auth.php';
