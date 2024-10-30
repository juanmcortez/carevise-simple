<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

namespace App\Http\Requests\Individuals;

use Illuminate\Foundation\Http\FormRequest;

class PhysicianRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'demographic_id' => ['nullable', 'exists:demographics'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
