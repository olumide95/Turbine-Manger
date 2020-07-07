<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    public static function boot()
    {
        parent::boot();

        Permission::observe(new \App\Observers\UserActionsObserver);
    }
}