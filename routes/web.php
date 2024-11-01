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
    });
