<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //
    //Module has many links 
    public function module_links()
    {
        return $this->hasMany('App\ModuleLink');
    }
    
    
    
}
