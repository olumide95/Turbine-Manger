<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectPersonnel extends Model
{

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'project_id','personnel_id'];

     public static function boot()
    {
        parent::boot();

        ProjectPersonnel::observe(new \App\Observers\UserActionsObserver);
    }

     public function personnel()
    {
        return $this->hasOne(Personnel::class, 'id','personnel_id');
    }

     public function project()
    {
        return $this->hasOne(Project::class, 'id','project_id');
    }
}
