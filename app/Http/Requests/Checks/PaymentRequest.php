<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

namespace App\Http\Requests\Checks;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'chk' => ['nullable', 'exists:checks'],
            'chr' => ['nullable', 'exists:invoices_charges'],
            'amount' => ['nullable', 'decimal:2'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
