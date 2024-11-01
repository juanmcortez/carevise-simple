<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

namespace App\Models\Invoices;

use App\Models\Patients\Patient;
use App\Models\Institutions\Facility;
use App\Models\Individuals\Physician;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Encounter extends Model
{
    use SoftDeletes, HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'enc';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'invoices_encounters';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pid',
        'rendering_physician_id',
        'referring_physician_id',
        'service_facility_id',
        'billing_facility_id',
        'date_of_service',
        'date_of_entry',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'pid',
        'patient',
        'rendering_physician_id',
        'referring_physician_id',
        'service_facility_id',
        'billing_facility_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'date_of_service' => 'datetime:M d, Y',
            'date_of_entry' => 'datetime:M d, Y',
        ];
    }

    /**
     * The patient relationship associated with the model.
     *
     * @return BelongsTo
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'pid', 'pid')
            ->withDefault();
    }

    /**
     * The rendering physician relationship associated with the model.
     *
     * @return HasOne
     */
    public function renderingPhysician(): HasOne
    {
        return $this->hasOne(Physician::class, 'id', 'rendering_physician_id')
            ->withDefault();
    }

    /**
     * The referring physician relationship associated with the model.
     *
     * @return HasOne
     */
    public function referringPhysician(): HasOne
    {
        return $this->hasOne(Physician::class, 'id', 'referring_physician_id')
            ->withDefault();
    }

    /**
     * The service facility relationship associated with the model.
     *
     * @return HasOne
     */
    public function serviceFacility(): HasOne
    {
        return $this->hasOne(Facility::class, 'id', 'service_facility_id')
            ->withDefault();
    }

    /**
     * The billing facility relationship associated with the model.
     *
     * @return HasOne
     */
    public function billingFacility(): HasOne
    {
        return $this->hasOne(Facility::class, 'id', 'billing_facility_id')
            ->withDefault();
    }

    /**
     * The charges relationship associated with the model
     *
     * @return HasMany
     */
    public function charges(): HasMany
    {
        return $this->hasMany(Charge::class, 'enc', 'enc')
            ->orderBy('code');
    }
}
