<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property Clinical $clinics
 */
class Service extends Model
{
    protected $fillable = ['service'];

    public $timestamps = false;

    public function clinics()
    {
        return $this->belongsToMany(Clinical::class);
    }
}
