<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

namespace Database\Factories\Checks;

use App\Models\Checks\Check;
use Illuminate\Database\Eloquent\Factories\Factory;

class CheckFactory extends Factory
{
    protected $model = Check::class;

    public function definition(): array
    {
        return [
            'check_date' => $this->faker->dateTimeBetween('-2 years', '-1 Month'),
            'check_deposit_date' => $this->faker->dateTimeBetween('-2 years', '-1 Month'),
            'check_post_to_date' => $this->faker->dateTimeBetween('-2 years', '-1 Month'),
            'payment_entity' => $this->faker->word(),
            'payment_category' => $this->faker->word(),
            'payment_method' => $this->faker->word(),
        ];
    }
}
