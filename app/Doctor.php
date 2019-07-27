<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $last_name
 * @property int $first_name
 * @property int $specialty_id
 * @property int $address_id
 * @property int $creator_id
 * @property int $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $specialty
 * @property Carbon $address
 * @property User $creator
 * @property User $user
 * @property Language $languages
 */
class Doctor extends Model
{
    protected $fillable = [
        'last_name', 'first_name', 'phone',
        'visit', 'specialty_id', 'address_id',
        'opening_id' ,'creator_id', 'user_id',
    ];

    public function getFullNameAttribute()
    {
        return 'last';
    }

    public function specialty()
    {
        return  $this->belongsTo(Specialty::class);
    }
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class,'creator_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }
}
