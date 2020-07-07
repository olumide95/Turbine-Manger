<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TurbineMaintainanceLog extends Model
{
    protected $fillable =['turbine_id',	'inspection_type','proposed_hours','actual_hours','actual_date','total_fails','remark'];
}
