<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    //
    public function income(){
        return $this->hasMany('App\Income');
    }
}
