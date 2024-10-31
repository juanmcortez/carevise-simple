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
        Schema::create('invoices_charges_icds', function (Blueprint $table) {
            $table->id('icd');

            $table->foreignId('chr')
                ->nullable()
                ->constrained('invoices_charges', 'chr');

            $table->string('code')->nullable();
            $table->text('code_description')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices_charges_icds');
    }
};
