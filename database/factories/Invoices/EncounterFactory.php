<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

namespace Database\Factories\Invoices;

use App\Models\Patients\Patient;
use App\Models\Invoices\Encounter;
use App\Models\Individuals\Physician;
use App\Models\Institutions\Facility;
use Illuminate\Database\Eloquent\Factories\Factory;

class EncounterFactory extends Factory
{
    protected $model = Encounter::class;

    public function definition(): array
    {
        return [
            'date_of_service' => $this->faker->dateTimeBetween('-6 years', '-1 Month'),
            'date_of_entry' => $this->faker->dateTimeBetween('-1 month', '2 days'),
            'pid' => Patient::factory(),
            'rendering_physician_id' => Physician::factory(),
            'referring_physician_id' => Physician::factory(),
            'service_facility_id' => Facility::factory(),
            'billing_facility_id' => Facility::factory(),
        ];
    }
}
