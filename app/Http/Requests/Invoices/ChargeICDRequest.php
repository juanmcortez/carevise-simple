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

class ChargeICDRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'chr' => ['nullable', 'exists:invoices_charges'],
            'code' => ['nullable'],
            'code_description' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
