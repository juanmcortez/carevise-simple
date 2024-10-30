<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

namespace App\Http\Requests\Institutions;

use Illuminate\Foundation\Http\FormRequest;

class FacilityRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'address_id' => ['required', 'exists:demographics_addresses'],
            'pay_to_address_id' => ['required', 'exists:demographics_addresses'],
            'phone_id' => ['required', 'exists:demographics_phones'],
            'cellphone_id' => ['required', 'exists:demographics_phones'],
            'fax_id' => ['required', 'exists:demographics_phones'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
