<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'user_id' => 2,
            'name' => 'Adrian',
            'first_last_name' => 'Gúzman',
            'second_last_name' => 'López',
            'curp' => 'GULA780912HCLZOD00',
            'rfc' => 'GULO7809121H0',
            'birthdate' => '1978-09-12',
            'phone' => '8711077856'
        ]);

        DB::table('customers')->insert([
            'user_id' => 2,
            'name' => 'Marina',
            'first_last_name' => 'Montoya',
            'second_last_name' => 'García',
            'curp' => 'MOGM881014MZSNAA01',
            'rfc' => 'MAGA8810141H0',
            'birthdate' => '1988-10-14',
            'phone' => '8711090857'
        ]);
    }
}
