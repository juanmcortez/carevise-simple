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
        Schema::create('demographics', function (Blueprint $table) {
            $table->id();

            $table->foreignId('address_id')
                ->nullable()
                ->constrained('demographics_addresses')
                ->cascadeOnDelete();

            $table->foreignId('phone_id')
                ->nullable()
                ->constrained('demographics_phones')
                ->cascadeOnDelete();

            $table->foreignId('cellphone_id')
                ->nullable()
                ->constrained('demographics_phones')
                ->cascadeOnDelete();

            $table->foreignId('email_address_id')
                ->nullable()
                ->constrained('demographics_emails_addresses')
                ->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('demographics');
    }
};
