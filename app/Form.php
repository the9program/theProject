<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $last_name
 * @property int $first_name
 * @property int $gender
 * @property int $birth
 * @property int $user_id
 * @property int $creator_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property User $user
 * @property User $creator
 * @property Appointment $appointments
 */
class Form extends Model
{

    protected $fillable = [
        'last_name', 'first_name', 'gender', 'birth', 'mobile', 'user_id', 'creator_id'
    ];

    public function getFullNameAttribute()
    {
        return strtoupper($this->last_name) . ' ' . ucfirst($this->first_name);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class,'creator_id');
    }

    public function appointments()
    {
        return $this->hasMany(Form::class);
    }
}
