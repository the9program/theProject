<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property User $users
 * @property Doctor $doctors
 */
class Language extends Model
{

    protected $fillable = ['language'];

    public $timestamps = false;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }

}
