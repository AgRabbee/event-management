<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth', 'prefix'=>'dashboard'], function () {
    Route::get('/', function () {
        return view('layouts.admin');
    })->name('dashboard');


    Route::get('events/list', [EventController::class, 'getEventList'])->name('events.list');
    Route::post('events/organizer/add', [EventController::class, 'addEventOrganizer'])->name('organizer.add');
    Route::resource('events', EventController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
});


