<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
 */
class Vehicle extends Model
{
    protected $table = 'vehicle';
}
