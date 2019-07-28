<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property Carbon $season
 * @property Carbon $passed
 * @property int $user_id
 * @property int $form_id
 * @property int $availability_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property User $user
 * @property Form $form
 * @property Availability $availability
 */

class Appointment extends Model
{
    protected $fillable = [
        'user_id', 'form_id', 'availability_id', 'season', 'passed'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function availability()
    {
        return $this->belongsTo(Availability::class);
    }

}
