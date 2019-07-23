<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $full_name
 * @property int $joint_id
 * @property int $specialty_id
 * @property int $city_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Joint $joint
 * @property Specialty $specialty
 * @property City $city
 */
class Search extends Model
{

    protected $fillable = [
        'full_name', 'joint_id', 'specialty_id', 'city_id'
    ];

    public function joint()
    {
        return $this->belongsTo(Joint::class);
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

}
