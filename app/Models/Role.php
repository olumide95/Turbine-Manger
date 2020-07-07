<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
     public static function boot()
    {
        parent::boot();

        Role::observe(new \App\Observers\UserActionsObserver);
    }
}