<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

namespace App\Http\Requests\Commons;

use Illuminate\Validation\Rule;
use App\Models\Commons\EmailAddress;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class EmailAddressRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', Rule::unique(EmailAddress::class, 'email')],
            'email_verified_at' => ['nullable', 'date'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
