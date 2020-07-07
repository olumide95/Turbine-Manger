<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name','start_date','end_date','location','project_manager','type'];
    
     public static function boot()
    {
        parent::boot();

        Project::observe(new \App\Observers\UserActionsObserver);
    }

       public function getFillable()
    {
        return $this->fillable;
    }

}
