<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int $id
 * @property string $email
 * @property string $password
 * @property Carbon $email_verified_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $category_id
 * @property Category $category
 * @property int $language_id
 * @property Language $language
 * @property Real $real
 * @property Doctor $doctor
 * @property Doctor $doctors_created
 * @property Availability $availability
 * @property Form $form
 * @property Form $forms_created
 */
class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'email', 'password', 'email_verified_at', 'category_id', 'language_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function real()
    {
        return $this->hasOne(Real::class);
    }

    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public function doctors_created()
    {
        return $this->hasMany(Doctor::class,'creator_id');
    }

    public function availability()
    {
        return $this->hasMany(Availability::class);
    }

    public function form()
    {
        return $this->hasOne(Form::class);
    }

    public function forms_created()
    {
        return $this->hasMany(Form::class);
    }


}
