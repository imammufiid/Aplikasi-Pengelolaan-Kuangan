<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = ['date', 'user_id', 'asset_id', 'account_id', 'total', 'info', 'created_at', 'updated_at'];

    public function user(){
        return $this->belongsTo('App\UserModel');
    }
    public function asset(){
        return $this->belongsTo('App\Asset');
    }
    public function account(){
        return $this->belongsTo('App\Account');
    }
}
