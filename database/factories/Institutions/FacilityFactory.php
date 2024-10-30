<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

namespace Database\Factories\Institutions;

use App\Models\Commons\Phone;
use App\Models\Commons\Address;
use App\Models\Institutions\Facility;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacilityFactory extends Factory
{
    protected $model = Facility::class;

    public function definition(): array
    {
        return [
            'address_id' => Address::factory(),
            'pay_to_address_id' => Address::factory(),
            'phone_id' => Phone::factory(),
            'cellphone_id' => Phone::factory(),
            'fax_id' => Phone::factory(),
        ];
    }
}
