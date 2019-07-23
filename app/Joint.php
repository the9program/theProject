<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $doctor_id
 * @property int $assistant_id
 * @property int $clinical_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Doctor $doctor
 * @property User $assistant
 * @property Clinical $clinical
 * @property Availability $availability
 */
class Joint extends Model
{

    protected $fillable = [
        'doctor_id', 'assistant_id', 'clinical_id'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function assistant()
    {
        return $this->belongsTo(User::class);
    }

    public function clinical()
    {
        return $this->belongsTo(Clinical::class);
    }

    public function availability()
    {
        return $this->hasMany(Availability::class);
    }

}
