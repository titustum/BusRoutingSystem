<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // dd(strtoupper(Auth::user()->usertype));
    if (Auth::check() && strcasecmp(Auth::user()->role, 'PASSENGER') === 0) {
        return view('passenger.dashboard');
    }
    return view('driver.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //specific routes
    Route::get('/passenger/dashboard', function () { return view('passenger.dashboard'); })->name('passenger.dashboard');
    Route::get('/driver/dashboard', function () { return view('driver.dashboard'); })->name('driver.dashboard');
});



require __DIR__.'/auth.php';
