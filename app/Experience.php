<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property boolean $study
 * @property string $title
 * @property string $establishment
 * @property Carbon $from
 * @property Carbon $to
 * @property int $doctor_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Doctor $doctor
 */

class Experience extends Model
{
    protected $fillable = [
        'study', 'title', 'establishment', 'from', 'to', 'doctor_id'
    ];

    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }
}
