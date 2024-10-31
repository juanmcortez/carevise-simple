<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

namespace Database\Factories\Invoices;

use App\Models\Invoices\ChargeICD;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChargeICDFactory extends Factory
{
    protected $model = ChargeICD::class;

    public function definition(): array
    {
        return [
            'code' => $this->faker->randomNumber(3, true) . '.' . $this->faker->randomNumber(2, true),
            'code_description' => $this->faker->text(),
        ];
    }
}
