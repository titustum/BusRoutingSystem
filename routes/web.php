<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\JourneyController;
use App\Http\Controllers\MpesaController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',Dashboard::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //specific routes
    Route::get('/passenger/dashboard', function () { return view('passenger.dashboard'); })->name('passenger.dashboard');
    Route::get('/driver/dashboard', function () { return view('driver.dashboard'); })->name('driver.dashboard');

    Route::resource('journeys', JourneyController::class);
    Route::resource('bookings', BookingController::class);
    Route::resource('payments', PaymentController::class);

    Route::get('journey/pay/{id}', [PaymentController::class, 'pay'])->name('journey.pay');

    Route::post('journeys/search', [JourneyController::class, 'search'])->name('journeys.search');


    Route::post('/mpesa/initiate', [MpesaController::class, 'initiatePayment'])->name('mpesa.initiatePayment');
    Route::post('/mpesa/callback', [MpesaController::class, 'handleCallback'])->name('mpesa.callback');
    Route::get('/payment/status/{paymentId}', [MpesaController::class, 'checkPaymentStatus'])->name('payment.status');

    Route::post('/passenger/store', [PassengerController::class, 'storeDetails'])->name('passenger.store');
    Route::post('/driver/store', [DriverController::class, 'storeDetails'])->name('driver.store');

});



require __DIR__.'/auth.php';
