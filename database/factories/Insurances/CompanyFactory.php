<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

namespace Database\Factories\Insurances;

use App\Models\Commons\Phone;
use App\Models\Commons\Address;
use App\Models\Insurances\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition(): array
    {
        return [
            'address_id' => Address::factory(),
            'phone_id' => Phone::factory(),
            'fax_id' => Phone::factory(),
        ];
    }
}
