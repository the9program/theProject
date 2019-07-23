<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $city
 * @property Address $addresses
 */
class City extends Model
{

    protected $fillable = ['city'];

    public $timestamps= false;

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

}
