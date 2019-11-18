<?php

use Illuminate\Database\Seeder;

class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cards')->insert([
            'card_number' => '4649084088377414',
            'card' => 1,
            'expiration_date' => '2024-10-11',
            'card_type' => 1
        ]);

        DB::table('cards')->insert([
            'card_number' => '4928952647204489',
            'card' => 2,
            'expiration_date' => '2021-10-31',
            'card_type' => 2
        ]);
    }
}
