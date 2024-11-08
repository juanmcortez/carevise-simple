<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Patients\PatientController;
use App\Http\Controllers\Commons\DashboardController;
use App\Http\Controllers\Invoices\EncounterController;

/**
 * Dashboard route with single action controller
 */
Route::get('/', DashboardController::class)
    ->name('dashboard');

/**
 * Patients routes based on a resource controller
 */
Route::controller(PatientController::class)
    ->name('patients.')
    ->group(function () {
        // List
        Route::get('/patients/list', 'index')
            ->name('list');
        // Detail
        Route::get('/patient/{patient}/account/details', 'show')
            ->name('detail')
            ->missing(function () {
                return Redirect::route('patients.list');
            });
    });

Route::controller(EncounterController::class)
    ->name('patient.encounter.')
    ->group(function () {
        // Detail
        Route::get('/patient/{patient}/encounter/{encounter}/details', 'edit')
            ->name('detail');
    });
