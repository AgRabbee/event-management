<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('landing');

Route::get('/{event_slug}/details', [App\Http\Controllers\PageController::class, 'eventDetails'])->name('event.details');
Route::get('/{event_slug}/purchase', [App\Http\Controllers\PageController::class, 'eventPurchase'])->name('event.purchase');
Route::post('/{event_slug}/payment', [App\Http\Controllers\PageController::class, 'proceedToPayment'])->name('event.proceedToPayment');

Route::post('/create-payment-intent', [PaymentController::class, 'createPaymentIntent'])->name('payment.createIntent');
Route::get('/complete/{order_id}', [PaymentController::class, 'complete'])->name('payment.complete');

Auth::routes();
