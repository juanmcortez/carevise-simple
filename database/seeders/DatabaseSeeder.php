<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

namespace Database\Seeders;

use App\Models\Users\User;
use Illuminate\Database\Seeder;
use App\Models\Patients\Patient;
use App\Models\Insurances\Company;
use App\Models\Invoices\Encounter;
use App\Models\Individuals\Physician;
use App\Models\Institutions\Facility;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Initial User
        $user = User::factory()->create([
            'username' => 'testuser',
        ]);
        $user->demographic->emailAddress()->update([
            'email' => 'text@example.com',
        ]);

        // Generic users
        User::factory(4)->create();

        // Generic Facilities
        Facility::factory(6)->create();

        // Generic Physicians
        Physician::factory(17)->create();

        // Generic Insurances
        Company::factory(32)->create();

        // Generic Patients
        Patient::factory(298)->create()->each(
            function($patient){
                $total_encounters = random_int(0, 5);
                if($total_encounters) {
                    Encounter::factory($total_encounters)->create([
                        'pid' => $patient->pid,
                        'rendering_physician_id' => Physician::query()->inRandomOrder()->first()->id,
                        'referring_physician_id' => Physician::query()->inRandomOrder()->first()->id,
                        'service_facility_id' => Facility::query()->inRandomOrder()->first()->id,
                        'billing_facility_id' => Facility::query()->inRandomOrder()->first()->id,
                    ]);
                }
            }
        );
    }
}
