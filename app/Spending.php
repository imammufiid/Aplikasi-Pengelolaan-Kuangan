<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Spending extends Model
{
    // <<<<<<< HEAD
    protected $fillable = ['date', 'user_id', 'asset_id', 'total', 'info', 'created_at', 'updated_at'];
    // =======
    //     protected $fillable = ['date', 'asset_id', 'accounts_id', 'total', 'info', 'created_at', 'updated_at'];
    // >>>>>>> baef73f9a2a1a648f266b6bae13355e512035094
    public static function nama_asset($id, $asset_id)
    {
        return DB::table('spendings')
            ->join('assets', 'assets.id', '=', 'spendings.asset_id')
            ->where('spendings.id', $id)
            ->where('spendings.user_id', $asset_id)
            ->select('assets.id AS asset_id', 'assets.asset')
            ->first();
    }
}
