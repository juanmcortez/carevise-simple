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
        Schema::create('checks_payments', function (Blueprint $table) {
            $table->id('pmt');

            $table->foreignId('chk')
                ->nullable()
                ->constrained('checks', 'chk');

            $table->foreignId('chr')
                ->nullable()
                ->constrained('invoices_charges', 'chr');

            $table->decimal('amount', 10, 2)
                ->nullable()
                ->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('checks_payments');
    }
};
