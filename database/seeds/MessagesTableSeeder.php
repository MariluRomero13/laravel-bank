<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            'credit_bureaus_id' => 1,
            'message' => 'No es una persona fiable de pagar',
        ]);

        DB::table('messages')->insert([
            'credit_bureaus_id' => 1,
            'message' => 'Quedó a deber más de $10,000 pesos',
        ]);
    }
}
