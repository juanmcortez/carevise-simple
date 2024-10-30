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
        Schema::create('invoices_encounters', function (Blueprint $table) {
            $table->id('enc');

            $table->foreignId('pid')
                ->nullable()
                ->constrained('patients', 'pid')
                ->cascadeOnDelete();

            $table->foreignId('rendering_physician_id')
                ->nullable()
                ->constrained('physicians')
                ->cascadeOnDelete();

            $table->foreignId('referring_physician_id')
                ->nullable()
                ->constrained('physicians')
                ->cascadeOnDelete();

            $table->foreignId('service_facility_id')
                ->nullable()
                ->constrained('facilities')
                ->cascadeOnDelete();

            $table->foreignId('billing_facility_id')
                ->nullable()
                ->constrained('facilities')
                ->cascadeOnDelete();

            $table->dateTime('date_of_service')->nullable();
            $table->dateTime('date_of_entry')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices_encounters');
    }
};
