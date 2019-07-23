<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property boolean $default
 * @property string $phone
 * @property int $real_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Real $real
 */
class Phone extends Model
{

    protected $fillable = ['default', 'phone', 'real_id'];

    public function real()
    {
        return $this->belongsTo(Real::class);
    }

}
