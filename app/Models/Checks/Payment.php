<?php
/*
 * Copyright (c) 2024
 *
 *  @author Juan Manuel Cortéz <juanm.cortez@gmail.com>
 *  @copyright 2024 Nobidium LLC.
 *  @license MIT License
 */

namespace App\Models\Checks;

use App\Models\Invoices\Charge;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use SoftDeletes, HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'pmt';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'checks_payments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'chk',
        'chr',
        'amount',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'chk',
        'chr',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The check relationship associated with the model.
     *
     * @return BelongsTo
     */
    public function check(): BelongsTo
    {
        return $this->belongsTo(Check::class, 'chk', 'chk')
            ->withDefault();
    }

    /**
     * The check relationship associated with the model.
     *
     * @return BelongsTo
     */
    public function charge(): BelongsTo
    {
        return $this->belongsTo(Charge::class, 'chr', 'chr')
            ->withDefault();
    }
}
