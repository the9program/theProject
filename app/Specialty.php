<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property Doctor $doctors
 */
class Specialty extends Model
{

    protected $fillable = ['specialty'];

    public $timestamps = false;

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

}
