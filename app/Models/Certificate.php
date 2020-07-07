<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    
 protected $fillable = [ 'name','certificate','personnel_id'];

     public static function boot()
    {
        parent::boot();

        Project::observe(new \App\Observers\UserActionsObserver);
    }

    public function osp()
    {
    
    	return	$this->where('name','Offshore Safety Permit')->orderby('created_at', 'desc')->first();
    	
    }


     public function cv()
    {
    	
    	return $this->where('name','Curriculum vitae')->orderby('created_at', 'desc')->first();
    	
    }


     public function trade()
    {
    	
		return $this->where('name','Trade Certificate')->orderby('created_at', 'desc')->first();
    	
    }
}
