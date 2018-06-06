<?php

namespace App;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    //
    
    public function rl()
    {
        return $this->belongsToMany('App\Role');
    }
}
