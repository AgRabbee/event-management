<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth', 'prefix'=>'dashboard'], function () {
    Route::get('/', function () {
        return view('layouts.admin');
    })->name('dashboard');


    Route::get('events/list', [EventController::class, 'getEventList'])->name('events.list');
    Route::post('events/organizer/add', [EventController::class, 'addEventOrganizer'])->name('organizer.add');
    Route::resource('events', EventController::class)->except(['show', 'edit', 'update', 'destroy']);
    Route::get('events/{slug}', [EventController::class, 'show'])->name('events.show');
    Route::get('events/{slug}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('events/{slug}', [EventController::class, 'update'])->name('events.update');
});


