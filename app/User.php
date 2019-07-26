<?php

namespace App;

use App\Notifications\Personal\ResetPasswordNotification;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $avatar
 * @property Carbon $email_verified_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $category_id
 * @property int $language_id
 * @property int $creator_id
 * @property Category $category
 * @property Language $language
 * @property User $creator
 * @property Real $real
 * @property Doctor $doctor
 * @property Doctor $doctors_created
 * @property Availability $availability
 * @property Form $form
 * @property Form $forms_created
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $fillable = [
        'avatar', 'email', 'password',
        'email_verified_at',
        'category_id', 'language_id', 'creator_id'
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


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }


}
