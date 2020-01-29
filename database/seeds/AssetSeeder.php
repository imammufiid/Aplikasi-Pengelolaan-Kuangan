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

        $ass1 = new Asset();
        $ass1->kode = '1112';
        $ass1->asset = 'Bank BCA';
        $ass1->created_at = new DateTime();
        $ass1->updated_at = new DateTime();
        $ass1->save();

        $ass2 = new Asset();
        $ass2->kode = '1113';
        $ass2->asset = 'Bank BNI';
        $ass2->created_at = new DateTime();
        $ass2->updated_at = new DateTime();
        $ass2->save();

        $ass3 = new Asset();
        $ass3->kode = '1114';
        $ass3->asset = 'Bank DBS';
        $ass3->created_at = new DateTime();
        $ass3->updated_at = new DateTime();
        $ass3->save();
        
        $ass4 = new Asset();
        $ass4->kode = '1115';
        $ass4->asset = 'Lain-lain';
        $ass4->created_at = new DateTime();
        $ass4->updated_at = new DateTime();
        $ass4->save();
    }
}
