<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

namespace App\Http\Controllers\Patients;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Patients\Patient;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    public function index(): View
    {
        $patients = Patient::query()
            ->join('demographics', 'demographics.id', '=', 'patients.demographic_id')
            ->orderBy('demographics.last_name')
            ->orderBy('demographics.first_name')
            ->orderBy('demographics.middle_name')
            ->select('patients.*')
            ->paginate(25);
        return view('pages.patients.list', compact('patients'));
    }

    public function create(): void
    {
        abort(404);
    }

    public function store(Request $request): void
    {
        abort(404);
    }

    public function show(Patient $patient): View
    {
        return view('pages.patients.show', compact('patient'));
    }

    public function edit(Patient $patient): void
    {
        abort(404);
    }

    public function update(Request $request, Patient $patient): void
    {
        abort(404);
    }

    public function destroy(Patient $patient): void
    {
        abort(404);
    }
}
