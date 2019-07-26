<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $category
 * @property User $users
 * @property Role $roles
 */
class Category extends Model
{

    protected $fillable = ['category'];

    public $timestamps = false;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

}
