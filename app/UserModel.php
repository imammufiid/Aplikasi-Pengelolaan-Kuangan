<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password'];

    public function income(){
        return $this->hasMany('App\Income');
    }
}
