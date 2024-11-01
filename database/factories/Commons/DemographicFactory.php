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
        $gender = $this->faker->randomElement(['male', 'female']);
        return [
            'first_name' => $this->faker->firstName($gender),
            'middle_name' => ($this->faker->boolean()) ? $this->faker->firstName($gender) : null,
            'last_name' => $this->faker->lastName(),
            'gender' => ($this->faker->boolean()) ? $gender : null,
            'date_of_birth' => $this->faker->dateTimeBetween('-95 years', '-1 years'),
            'address_id' => Address::factory(),
            'phone_id' => Phone::factory(),
            'cellphone_id' => Phone::factory(),
            'email_address_id' => EmailAddress::factory(),
        ];
    }
}
