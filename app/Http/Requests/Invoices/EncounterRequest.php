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

class EncounterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'pid' => ['nullable', 'exists:patients'],
            'rendering_physician_id' => ['nullable', 'exists:physicians'],
            'referring_physician_id' => ['nullable', 'exists:physicians'],
            'service_facility_id' => ['nullable', 'exists:facilities'],
            'billing_facility_id' => ['nullable', 'exists:facilities'],
            'date_of_service' => ['nullable', 'date'],
            'date_of_entry' => ['nullable', 'date'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
