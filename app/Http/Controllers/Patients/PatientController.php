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
    /**
     * @throws \Throwable
     */
    public function index(Request $request)
    {
        /*$patients = Patient::query()
            ->join('demographics', 'demographics.id', '=', 'patients.demographic_id')
            ->orderBy('demographics.last_name')
            ->orderBy('demographics.first_name')
            ->orderBy('demographics.middle_name')
            ->select('patients.*')
            ->paginate(25);*/
        
        $columns = [
            ['type' => 'selector', 'title' => '', 'sorting' => ''],
            ['type' => 'title', 'title' => 'Patient Name', 'sorting' => 'demographics.last_name'],
            ['type' => 'title', 'title' => 'SSN', 'sorting' => 'demographics.social_security_number'],
            ['type' => 'title', 'title' => 'Phone', 'sorting' => 'demographics.phone'],
            ['type' => 'title', 'title' => 'Birthdate', 'sorting' => 'demographics.date_of_birth'],
            ['type' => 'title', 'title' => 'PID', 'sorting' => 'patients.pid'],
            ['type' => 'title', 'title' => 'EID', 'sorting' => 'patients.eid'],
            ['type' => 'title', 'title' => 'Last visit', 'sorting' => 'invoices_encounters.date_of_service'],
            ['type' => 'empty', 'title' => '', 'sorting' => ''],
        ];

        $query = Patient::query()
            ->join('demographics', 'demographics.id', '=', 'patients.demographic_id')
            ->leftJoin('invoices_encounters', function ($join){
                $join->on('invoices_encounters.pid', '=', 'patients.pid')
                    ->whereRaw(
                        'invoices_encounters.date_of_service = (
                            SELECT MAX(ie.date_of_service)
                            FROM invoices_encounters AS ie
                            WHERE ie.pid = patients.pid
                        )'
                    );
            })
            ->select('patients.*', 'demographics.*', 'invoices_encounters.date_of_service')
            ->with('demographic', 'demographic.phone', 'invoices');

        // Handle sorting
        if ($request->has('sort') && $request->has('order')) {
            $query->orderBy($request->sort, $request->order);
        } else {
            $query->orderBy('demographics.last_name')
                ->orderBy('demographics.first_name')
                ->orderBy('demographics.middle_name');
        }

        // Handle searching
        /*foreach ($request->except('page', 'sort', 'order') as $column => $value) {
            if (!empty($value)) {
                $query->where($column, 'like', "%{$value}%");
            }
        }*/

        // Handle pagination
        if ($request->has('per_page')){
            $patients = $query->paginate($request->per_page);
        } else {
            $patients = $query->paginate(25);
        }



        if ($request->ajax()) {
            return response()->json([
                'table' => view('pages.patients.list-detail', compact('patients'))->render(),
                'pagination' => (string) $patients->links(),
            ]);
        }

        return view('pages.patients.list', compact('patients', 'columns'));
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
