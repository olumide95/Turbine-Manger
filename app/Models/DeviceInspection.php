<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceInspection extends Model
{
    protected $fillable =['device_id','check','D','W','M','Q','s','CI','HGPI','MI','X'];




    public function Device()
    {
        return $this->hasOne(Device::class, 'id','device_id');
    }
}
