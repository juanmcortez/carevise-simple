<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

namespace Database\Factories\Commons;

use App\Models\Commons\EmailAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmailAddressFactory extends Factory
{
    protected $model = EmailAddress::class;

    public function definition(): array
    {
        return [
            'email' => $this->faker->unique()->freeEmail(),
            'email_verified_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
