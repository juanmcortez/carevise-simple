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
use Illuminate\Foundation\Http\FormRequest;

class DemographicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array|string>
     */
    public function rules(): array
    {
        return [
            'first_name'        => ['required', 'string', 'max:128'],
            'middle_name'       => ['nullable', 'string', 'max:128'],
            'last_name'         => ['required', 'string', 'max:128'],
            'gender'            => ['nullable', 'string', 'max:32'],
            'date_of_birth'     => ['required', 'date', 'date_format:M d, Y', 'before_or_equal:today'],
            'address_id'        => [Rule::exists('demographics_addresses', 'id')],
            'phone_id'          => [Rule::exists('demographics_phones', 'id')],
            'cellphone_id'      => [Rule::exists('demographics_phones', 'id')],
            'email_address_id'  => [Rule::exists('demographics_emails_addresses', 'id')],
        ];
    }
}
