<?php

use Illuminate\Database\Seeder;

class CreditsBureauTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('credit_bureaus')->insert([
            'customer_id' => 2,
            'credit_id' => 2,
            'register_date' => '2018-09-14',
        ]);
    }
}
