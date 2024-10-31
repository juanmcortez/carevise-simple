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

return new class extends Migration {
    public function up(): void
    {
        Schema::create('checks', function (Blueprint $table) {
            $table->id('chk');

            $table->dateTime('check_date')->nullable();
            $table->dateTime('check_deposit_date')->nullable();
            $table->dateTime('check_post_to_date')->nullable();

            $table->string('payment_entity')
                ->nullable()
                ->default('insurance');

            $table->string('payment_category')
                ->nullable()
                ->default('insurance_payment');

            $table->string('payment_method')
                ->nullable()
                ->default('check_deposit');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('checks');
    }
};
