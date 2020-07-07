<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable =['system_id','name'];



    public function checks()
    {
        return $this->hasMany(DeviceInspection::class, 'device_id','id');
    }
}
