<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spending extends Model
{
    // <<<<<<< HEAD
    protected $fillable = ['date', 'user_id', 'asset_id', 'total', 'info', 'created_at', 'updated_at'];
    // =======
    //     protected $fillable = ['date', 'asset_id', 'accounts_id', 'total', 'info', 'created_at', 'updated_at'];
    // >>>>>>> baef73f9a2a1a648f266b6bae13355e512035094
}