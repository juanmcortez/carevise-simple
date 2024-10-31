<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

namespace Database\Factories\Invoices;

use App\Models\Invoices\Charge;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChargeFactory extends Factory
{
    protected $model = Charge::class;

    public function definition(): array
    {
        return [
            'code_type' => $this->faker->randomElement(['CPT4','HCPCS','ANES']),
            'code' => $this->faker->randomNumber(5, true),
            'code_description' => $this->faker->text(),
            'code_fee' => $this->faker->randomFloat(2, 10, 9999),
        ];
    }
}
