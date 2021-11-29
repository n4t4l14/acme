<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Person
 * @package App\Models
 *
 * @property int id
 * @property string identification_number
 * @property string first_name
 * @property string second_name
 * @property string surnames
 * @property string address
 * @property string phone_number
 * @property string city
 * @property string role
 */
class Person extends Model
{
    /**
     * @var string
     */
    protected $table = 'person';

    /**
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->second_name . ' ' . $this->surnames;
    }
}
