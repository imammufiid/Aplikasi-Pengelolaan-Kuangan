<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = ['date', 'asset_id', 'accounts_id', 'total', 'info', 'created_at', 'updated_at'];
}
