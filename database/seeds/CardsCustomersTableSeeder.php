<?php

use Illuminate\Database\Seeder;

class CardsCustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('card_customer')->insert([
            'card_id' => '4928952647204489',
            'customer_id' => 1
        ]);

        DB::table('card_customer')->insert([
            'card_id' => '4649084088377414',
            'customer_id' => 1
        ]);
    }
}
