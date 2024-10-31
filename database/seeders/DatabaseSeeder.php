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
use App\Models\Checks\Check;
use App\Models\Checks\Payment;
use Illuminate\Database\Seeder;
use App\Models\Invoices\Charge;
use App\Models\Patients\Patient;
use App\Models\Insurances\Company;
use App\Models\Invoices\Encounter;
use App\Models\Invoices\ChargeICD;
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
        Patient::factory(75)->create()->each(
            function ($patient) {
                $total_encounters = random_int(0, 5);
                if ($total_encounters) {
                    Encounter::factory($total_encounters)->create([
                        'pid' => $patient->pid,
                        'rendering_physician_id' => Physician::query()->inRandomOrder()->first()->id,
                        'referring_physician_id' => Physician::query()->inRandomOrder()->first()->id,
                        'service_facility_id' => Facility::query()->inRandomOrder()->first()->id,
                        'billing_facility_id' => Facility::query()->inRandomOrder()->first()->id,
                    ])->each(
                        function ($invoice) {
                            $total_charges = random_int(0, 10);
                            Charge::factory($total_charges)->create([
                                'enc' => $invoice->enc,
                            ])->each(
                                function ($charge) {
                                    $total_icds = random_int(0, 12);
                                    if ($total_icds) {
                                        ChargeICD::factory($total_icds)->create([
                                            'chr' => $charge->chr,
                                        ]);
                                    }
                                }
                            );
                        }
                    );
                }
            }
        );

        // Generic Checks
        Check::factory(22)->create([
            'payment_entity' => 'insurance',
            'payment_category' => 'insurance_payment',
            'payment_method' => 'check_deposit'
        ])->each(
            function ($check) {
                $patient = Patient::query()->inRandomOrder()->first();
                $total_invoices = $patient->invoices->count();
                $total_payments = random_int(1, 3);
                if ($total_invoices) {
                    // Create payments tied to charges
                    $invoice = $patient->invoices()->inRandomOrder()->first();
                    $invoice->charges()->each(
                        function ($charge) use ($total_payments, $check) {
                            Payment::factory($total_payments)->create([
                                'chk' => $check->chk,
                                'chr' => $charge->chr,
                            ]);
                        }
                    );
                } else {
                    // Create payment only tied to the check
                    Payment::factory($total_payments)->create([
                        'chk' => $check->chk,
                    ]);
                }
            }
        );
    }
}
