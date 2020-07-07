<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OperationLog extends Model
{
    protected $fillable =['turbine_id','system_id','remark','start_date','end_date'];
}
