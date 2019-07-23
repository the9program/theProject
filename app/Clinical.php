<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $address_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Address $address
 * @property Service $services
 */
class Clinical extends Model
{
    protected $fillable = ['name', 'visit', 'address_id'];

    protected $table = 'clinics';

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

}
