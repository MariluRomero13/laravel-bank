<?php

use Illuminate\Database\Seeder;

class CreditsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('credits')->insert([
            'credit_bureaus_id' => 1,
            'institution_name' => 'Walmart',
            'credit_type' => 1,
            'description' => 'Nor again is there anyone who loves or pursues or desires to obtain
                                pain of itself, because it is pain,
                                but occasionally circumstances occur in which
                                toil and pain can procure him some great pleasure',
            'status' => 1,
            'behavior' => 3
        ]);
    }
}
