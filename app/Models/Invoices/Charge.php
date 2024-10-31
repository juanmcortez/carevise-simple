<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

namespace App\Models\Invoices;

use App\Models\Checks\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Charge extends Model
{
    use SoftDeletes, HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'chr';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'invoices_charges';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'enc',
        'code_type',
        'code',
        'code_description',
        'code_fee',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'chr',
        'enc',
        'code_description',
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
            'code_fee' => 'decimal:2',
        ];
    }

    /**
     * The invoice relationship associated with the model.
     *
     * @return BelongsTo
     */
    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Encounter::class, 'enc', 'enc')
            ->withDefault();
    }

    /**
     * The icds relationship associated with the model.
     *
     * @return HasMany
     */
    public function icds(): HasMany
    {
        return $this->hasMany(ChargeICD::class, 'chr', 'chr')
            ->orderBy('code');
    }

    /**
     * The payments relationship associated with the model.
     *
     * @return HasMany
     */
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'chr', 'chr');
    }
}
