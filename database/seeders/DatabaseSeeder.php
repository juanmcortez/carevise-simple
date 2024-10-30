<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

namespace Database\Seeders;

use App\Models\Users\User;
use Illuminate\Database\Seeder;
use App\Models\Patients\Patient;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Inital User
        $user = User::factory()->create([
            'username' => 'testuser',
        ]);
        $user->demographic->emailAddress()->update([
            'email' => 'text@example.com',
        ]);

        // Generic users
        User::factory(4)->create();

        // Generic Patients
        Patient::factory(298)->create();
    }
}
