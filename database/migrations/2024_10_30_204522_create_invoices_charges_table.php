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
        Schema::create('invoices_charges', function (Blueprint $table) {
            $table->id('chr');

            $table->foreignId('enc')
                ->nullable()
                ->constrained('invoices_encounters', 'enc');

            $table->string('code_type', 5)->nullable();
            $table->string('code', 10)->nullable();
            $table->text('code_description')->nullable();
            $table->decimal('code_fee', 10, 2)
                ->nullable()
                ->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices_charges');
    }
};
