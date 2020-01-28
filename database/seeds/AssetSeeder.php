<?php

use App\Asset;
use Illuminate\Database\Seeder;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ass = new Asset();
        $ass->kode = '1111';
        $ass->asset = 'Kas';
        $ass->created_at = new DateTime();
        $ass->updated_at = new DateTime();
        $ass->save();

        $ass = new Asset();
        $ass->kode = '1112';
        $ass->asset = 'Bank BCA';
        $ass->created_at = new DateTime();
        $ass->updated_at = new DateTime();
        $ass->save();

        $ass = new Asset();
        $ass->kode = '1113';
        $ass->asset = 'Bank BNI';
        $ass->created_at = new DateTime();
        $ass->updated_at = new DateTime();
        $ass->save();

        $ass = new Asset();
        $ass->kode = '1114';
        $ass->asset = 'Bank DBS';
        $ass->created_at = new DateTime();
        $ass->updated_at = new DateTime();
        $ass->save();
        
        $ass = new Asset();
        $ass->kode = '1115';
        $ass->asset = 'Lain-lain';
        $ass->created_at = new DateTime();
        $ass->updated_at = new DateTime();
        $ass->save();
    }
}
