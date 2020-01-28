<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = ['date', 'assets', 'accounts', 'total', 'info', 'created_at', 'updated_at'];
}
