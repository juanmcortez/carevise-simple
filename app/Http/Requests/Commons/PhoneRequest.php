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

class PhoneRequest extends FormRequest
{
    public function rules(): array
    {
        return [

        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
