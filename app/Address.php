<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property boolean $default
 * @property string $address
 * @property int $build
 * @property int $floor
 * @property int $apt_nbr
 * @property int $zip
 * @property int $city_id
 * @property int $real_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $full_address
 * @property City $city
 * @property Real $real
 * @property Doctor $doctor
 * @property Clinical $clinics
 */
class Address extends Model
{
    protected $fillable = [
        'default', 'address', 'build', 'floor', 'apt_nbr', 'zip', 'city_id', 'real_id'
    ];

    public function getFullAddressAttribute()
    {

        $return =  $this->build . ', ' . $this->address . ', ';

        if($this->floor){
            $return .= __('validation.attributes.floor') . ' : ' . $this->floor . ', ' . __('validation.attributes.apt_nbr') . ' : ' . $this->apt_nbr . '. ';
        }

        $return .=  $this->city->city;

        return $return;
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function real()
    {
        return $this->belongsTo(Real::class);
    }

    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public function clinics()
    {
        return $this->hasOne(Clinical::class);
    }

}
