<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $last_name
 * @property string $first_name
 * @property boolean $gender
 * @property Carbon $birth
 * @property int $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $full_name
 * @property User $user
 * @property Address $addresses
 * @property Phone $phones
 */
class Real extends Model
{

    protected $fillable = [
        'last_name', 'first_name', 'gender', 'birth', 'user_id'
    ];

    protected $casts = [
        'birth' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    public function getFullNameAttribute()
    {
        return strtoupper($this->last_name)  . ' ' . ucfirst($this->first_name);
    }

    public function getDefaultAddressAttribute()
    {
        $address =  $this->addresses()->where('default',true)->first();
        return ($address) ? $address->full_address : null;
    }

    public function getDefaultMobileAttribute()
    {
        $mobile =  $this->phones()->where('default',true)->first();
        return ($mobile) ? $mobile->phone : null;
    }

}
