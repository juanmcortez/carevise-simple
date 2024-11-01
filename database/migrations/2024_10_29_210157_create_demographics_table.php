<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('demographics', function (Blueprint $table) {
            $table->id();

            $table->string('first_name', 128);
            $table->string('middle_name', 128)->nullable();
            $table->string('last_name', 128);

            $table->string('gender', 32)->nullable();
            $table->date('date_of_birth')->default(Carbon::now()->format('Y-m-d'));

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
