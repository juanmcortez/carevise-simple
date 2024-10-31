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

class CheckRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'check_date' => ['nullable', 'date'],
            'check_deposit_date' => ['nullable', 'date'],
            'check_post_to_date' => ['nullable', 'date'],
            'payment_entity' => ['nullable'],
            'payment_category' => ['nullable'],
            'payment_method' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
