<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

namespace App\Http\Requests\Invoices;

use Illuminate\Foundation\Http\FormRequest;

class ChargeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'enc' => ['nullable', 'exists:invoices_encounters'],
            'code_type' => ['nullable'],
            'code' => ['nullable'],
            'code_description' => ['nullable'],
            'code_fee' => ['nullable', 'decimal:2'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
