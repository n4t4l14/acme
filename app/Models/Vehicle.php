<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Vehicle
 * @package App\Models
 *
 * @property int id
 * @property string plate
 * @property string color
 * @property string brand
 * @property string type
 * @property string driver_id
 * @property string owner_id
 * @property Person driver
 */
class Vehicle extends Model
{
    /**
     * @var string
     */
    protected $table = 'vehicle';

    /**
     * @return BelongsTo
     */
    public function driver(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'driver_id');
    }

    /**
     * @return BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'owner_id');
    }
}
