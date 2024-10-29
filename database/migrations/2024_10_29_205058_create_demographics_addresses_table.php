<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('demographics_addresses', function (Blueprint $table) {
            $table->id();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('demographics_addresses');
    }
};
