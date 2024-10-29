<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

namespace App\Http\Requests\Commons;

use Illuminate\Foundation\Http\FormRequest;

class DemographicRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'address_id' => ['nullable', 'exists:demographics_addresses'],
            'phone_id' => ['nullable', 'exists:demographics_phones'],
            'cellphone_id' => ['nullable', 'exists:demographics_phones'],
            'email_address_id' => ['nullable', 'exists:demographics_emails_addresses'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
