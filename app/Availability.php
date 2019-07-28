<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property Carbon $from
 * @property Carbon $to
 * @property int $user_id
 * @property int $joint_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property User $user
 * @property Joint $joint
 * @property Appointment $appointments
 */
class Availability extends Model
{
    protected $fillable = ['from', 'to', 'user_id', 'joint_id', 'available'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function joint()
    {
        return $this->belongsTo(Joint::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
