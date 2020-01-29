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

        $ass1 = new Account();
        $ass1->kode = '2112';
        $ass1->account = 'Gaji';
        $ass1->created_at = new DateTime();
        $ass1->updated_at = new DateTime();
        $ass1->save();

        $ass2 = new Account();
        $ass2->kode = '2113';
        $ass2->account = 'Uang Saku';
        $ass2->created_at = new DateTime();
        $ass2->updated_at = new DateTime();
        $ass2->save();

        $ass3 = new Account();
        $ass3->kode = '2114';
        $ass3->account = 'Lain-lain';
        $ass3->created_at = new DateTime();
        $ass3->updated_at = new DateTime();
        $ass3->save();
    }
}
