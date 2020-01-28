<?php

use App\Account;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ass = new Account();
        $ass->kode = '2111';
        $ass->account = 'Hasil Usaha';
        $ass->created_at = new DateTime();
        $ass->updated_at = new DateTime();
        $ass->save();

        $ass = new Account();
        $ass->kode = '2112';
        $ass->account = 'Gaji';
        $ass->created_at = new DateTime();
        $ass->updated_at = new DateTime();
        $ass->save();

        $ass = new Account();
        $ass->kode = '2113';
        $ass->account = 'Uang Saku';
        $ass->created_at = new DateTime();
        $ass->updated_at = new DateTime();
        $ass->save();

        $ass = new Account();
        $ass->kode = '2114';
        $ass->account = 'Lain-lain';
        $ass->created_at = new DateTime();
        $ass->updated_at = new DateTime();
        $ass->save();
    }
}
