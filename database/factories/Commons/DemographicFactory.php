<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

namespace Database\Factories\Commons;

use App\Models\Commons\Phone;
use App\Models\Commons\Address;
use App\Models\Commons\Demographic;
use App\Models\Commons\EmailAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

class DemographicFactory extends Factory
{
    protected $model = Demographic::class;

    public function definition(): array
    {
        return [
            'address_id' => Address::factory(),
            'phone_id' => Phone::factory(),
            'cellphone_id' => Phone::factory(),
            'email_address_id' => EmailAddress::factory(),
        ];
    }
}
