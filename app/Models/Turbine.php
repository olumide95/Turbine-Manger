<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTime;
class Turbine extends Model
{
    protected $fillable =['name','current_fails','estimated_hours','estimated_date'];


    
    public function shutdown_for()
    {

    	$log = \App\Models\TurbineMaintainanceLog::where('turbine_id',$this->id)->where('actual_hours','')->first();
    	if (isset($log->id)) {
    		return $log->inspection_type;
    	}
    	return '';
    
    }


    public function log()
    {

    	$log = \App\Models\TurbineMaintainanceLog::where('turbine_id',$this->id)->where('actual_date','!=','')->where('total_fails','!=','')->orderby('id','desc')->first();
    	
    	return $log;
    
    }


    public function getHours($date)
    {
    	$date1 = new DateTime($date);
		$date2 = new DateTime(date('d-M-y'));

		$diff = $date2->diff($date1);

		$hours = $diff->h;
		$hours = $hours + ($diff->days*24);

		echo $hours;
    }
}
