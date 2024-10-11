<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('landing');

Route::get('/{event_slug}/details', [App\Http\Controllers\PageController::class, 'eventDetails'])->name('event.details');

Auth::routes();
