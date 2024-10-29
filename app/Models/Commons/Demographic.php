<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

namespace App\Models\Commons;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Demographic extends Model
{
    use SoftDeletes, HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $fillable = [
        'address_id',
        'phone_id',
        'cellphone_id',
        'email_address_id',
    ];

    /**
     * The address relationship associated with the model.
     *
     * @return HasOne
     */
    public function address(): HasOne
    {
        return $this->hasOne(Address::class, 'id', 'address_id')
            ->withDefault();
    }

    /**
     * The phone relationship associated with the model.
     *
     * @return HasOne
     */
    public function phone(): HasOne
    {
        return $this->hasOne(Phone::class, 'id', 'phone_id')
            ->withDefault();
    }

    /**
     * The cellphone relationship associated with the model.
     *
     * @return HasOne
     */
    public function cellphone(): HasOne
    {
        return $this->hasOne(Phone::class, 'id', 'cellphone_id')
            ->withDefault();
    }

    /**
     * The email address relationship associated with the model.
     *
     * @return HasOne
     */
    public function emailAddress(): HasOne
    {
        return $this->hasOne(EmailAddress::class, 'id', 'email_address_id')
            ->withDefault();
    }
}
