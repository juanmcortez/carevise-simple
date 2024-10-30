<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

namespace App\Models\Patients;

use App\Models\Invoices\Encounter;
use App\Models\Commons\Demographic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use SoftDeletes, HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'pid';

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['demographic'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'demographic_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'demographic_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The demographic relationship associated with the model.
     *
     * @return HasOne
     */
    public function demographic(): HasOne
    {
        return $this->hasOne(Demographic::class, 'id', 'demographic_id')
            ->withDefault();
    }

    /**
     * The invoices relationship associated with the model.
     *
     * @return HasMany
     */
    public function invoices(): HasMany
    {
        return $this->hasMany(Encounter::class, 'pid', 'pid')
            ->orderBy('date_of_service', 'desc');
    }
}
