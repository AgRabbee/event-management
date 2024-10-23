<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth', 'prefix'=>'dashboard'], function () {
    Route::get('/', function () {
        return view('layouts.admin');
    })->name('dashboard');


    Route::get('events/list', [EventController::class, 'getEventList'])->name('events.list');
    Route::post('events/organizer/add', [EventController::class, 'addEventOrganizer'])->name('organizer.add');
    Route::post('events/{slug}/status', [EventController::class, 'updateStatus'])->name('events.updateStatus');
    Route::resource('events', EventController::class)->except(['show', 'edit', 'update', 'destroy']);
    Route::get('events/{slug}', [EventController::class, 'show'])->name('events.show');
    Route::get('events/{slug}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('events/{slug}', [EventController::class, 'update'])->name('events.update');

    Route::get('events/{slug}/form_fields', [EventController::class, 'eventFormFields'])->name('events.formFields');
    Route::put('events/{slug}/form_fields', [EventController::class, 'eventFormFieldsUpdate'])->name('events.formFieldsUpdate');

    Route::post('form_field/get-structure', [EventController::class, 'formFieldStructure'])->name('events.formFieldStructure');
    Route::post('form_field/get-structure-with-old-value', [EventController::class, 'formFieldStructureWithOldValue'])->name('events.formFieldStructureWithOldValue');

    Route::get('events/{slug}/ticket-packages', [EventController::class, 'ticketPackages'])->name('events.ticketPackages');
    Route::put('events/{slug}/ticket-packages', [EventController::class, 'ticketPackagesUpdate'])->name('events.ticketPackagesUpdate');
});


