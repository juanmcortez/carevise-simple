<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

namespace App\Models\Institutions;

use App\Models\Commons\Phone;
use App\Models\Commons\Address;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facility extends Model
{
    use SoftDeletes, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address_id',
        'pay_to_address_id',
        'phone_id',
        'cellphone_id',
        'fax_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The address relationship associated with the model.
     *
     * @return HasOne
     */
    public function address(): HasOne
    {
        return $this->hasOne(Address::class, 'id', 'address_id');
    }

    /**
     * The pay-to address relationship associated with the model.
     *
     * @return HasOne
     */
    public function payToAddress(): HasOne
    {
        return $this->hasOne(Address::class, 'id', 'pay_to_address_id');
    }

    /**
     * The phone relationship associated with the model.
     *
     * @return HasOne
     */
    public function phone(): HasOne
    {
        return $this->hasOne(Phone::class, 'id', 'phone_id');
    }

    /**
     * The cellphone relationship associated with the model.
     *
     * @return HasOne
     */
    public function cellphone(): HasOne
    {
        return $this->hasOne(Phone::class, 'id', 'cellphone_id');
    }

    /**
     * The fax relationship associated with the model.
     *
     * @return HasOne
     */
    public function fax(): HasOne
    {
        return $this->hasOne(Phone::class, 'id', 'fax_id');
    }
}
