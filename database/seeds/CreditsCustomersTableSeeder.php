<?php

use Illuminate\Database\Seeder;

class CreditsCustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('credit_customer')->insert([
            'credit_id' => 1,
            'customer_id' => 1
        ]);

        DB::table('credit_customer')->insert([
            'credit_id' => 1,
            'customer_id' => 2
        ]);
    }
}
