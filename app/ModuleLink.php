<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModuleLink extends Model
{
    //
    
    public function module()
    {
        return $this->belongsTo('App\Module');
    }
    
    
    
}
