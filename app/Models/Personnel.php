<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name','email','company','designation','category','employment_status','t_bosiet','t_bosiet_validity_date','malaria_validity_date','malaria','general_medicals','general_medicals_validity_date','tuberculosis','tuberculosis_validity_date','alcohol_and_drug_validity_date','alcohol_and_drug','phone_number','nationality','image','osp','osp_validity_date','country'];



     public static function boot()
    {
        parent::boot();

        Personnel::observe(new \App\Observers\UserActionsObserver);
    }

    public function certificate()
    {
        return $this->hasOne(Certificate::class, 'personnel_id','id');
    }


    public function color_class($date)
    {
        if ($date <= date('Y-m-d')) {
           return 'btn-danger';
        }

 
         elseif ($date > date('Y-m-d') && $date <= date("Y-m-d", strtotime("+2 week", strtotime(date("Y-m-d"))))) {
           return 'btn-warning';
        }

        elseif ($date >= date("Y-m-d", strtotime("+2 week", strtotime(date("Y-m-d"))))) {
           return 'btn-success';
        }
    }


    public function exp($date)
    {
        if (false === strtotime($date)) {
            echo 'invalid date';}
        else {
           $date2=date_create($date);
        $diff=date_diff(date_create(date('Y-m-d')),$date2);
        return $diff->format("%R%a days");
        }
        
    }


    public function getFillable()
    {
        return $this->fillable;
    }


}
