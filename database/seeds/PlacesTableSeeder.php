<?php

use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('places')->insert([
            'name' => 'Walmart'
        ]);

        DB::table('places')->insert([
            'name' => 'Coppel'
        ]);
    }
}
