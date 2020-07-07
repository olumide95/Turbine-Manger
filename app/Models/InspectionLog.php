<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InspectionLog extends Model
{
    protected $fillable =['turbine_id','system_id','inspection_id','remark','date'];




    public function DeviceInspection()
    {
        return $this->hasOne(DeviceInspection::class, 'id','inspection_id');
    }


    
}
