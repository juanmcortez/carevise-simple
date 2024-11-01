<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

namespace App\Http\Controllers\Invoices;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Patients\Patient;
use App\Models\Invoices\Encounter;
use App\Http\Controllers\Controller;

class EncounterController extends Controller
{
    public function index(): void
    {
        abort(404);
    }

    public function create(): void
    {
        abort(404);
    }

    public function store(Request $request): void
    {
        abort(404);
    }

    public function show(Encounter $encounter): void
    {
        abort(404);
    }

    public function edit(Patient $patient, Encounter $encounter): View
    {
        return view('pages.invoices.detail', compact('encounter'));
    }

    public function update(Request $request, Encounter $encounter): void
    {
        abort(404);
    }

    public function destroy(Encounter $encounter): void
    {
        abort(404);
    }
}
