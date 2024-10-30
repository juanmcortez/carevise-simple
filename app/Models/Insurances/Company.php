<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

namespace App\Models\Insurances;

use App\Models\Commons\Phone;
use App\Models\Commons\Address;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use SoftDeletes, HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'insurances_companies';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $fillable = [
        'address_id',
        'phone_id',
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
     * The phone relationship associated with the model.
     *
     * @return HasOne
     */
    public function phone(): HasOne
    {
        return $this->hasOne(Phone::class, 'id', 'phone_id');
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
