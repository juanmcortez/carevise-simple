<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

namespace Database\Factories\Individuals;

use App\Models\Commons\Demographic;
use App\Models\Individuals\Physician;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhysicianFactory extends Factory
{
    protected $model = Physician::class;

    public function definition(): array
    {
        return [
            'demographic_id' => Demographic::factory(),
        ];
    }
}
