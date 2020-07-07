<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\RoleUser;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes, EntrustUserTrait {
    SoftDeletes::restore insteadof EntrustUserTrait;
    EntrustUserTrait::restore insteadof SoftDeletes;
}

 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


     public function user_role()
    {
        return $this->hasOne(RoleUser::class, 'user_id');
    }

    public function isAdmin()
    {
        foreach ($this->role()->get() as $role) {
            if ($role->id == 1) {
                return true;
            }
        }

        return false;
    }
}
