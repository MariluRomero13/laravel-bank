<?php

use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            'customer_id' => 1,
            'street' => 'Aztecas',
            'external_number' => '345',
            'internal_number' => '78',
            'between_streets' => 'Av de la Paz y Xochimilco',
            'postal_code' => '27090',
            'neighborhood' => 'Carolinas',
            'country' => 'México',
            'state' => 'Coahuila',
            'city' => 'Torreón'
        ]);

        DB::table('addresses')->insert([
            'customer_id' => 1,
            'street' => 'Portugal',
            'external_number' => '009',
            'internal_number' => '08',
            'between_streets' => 'Las Etnias y calle Brasil',
            'postal_code' => '27056',
            'neighborhood' => 'Las Etnias',
            'country' => 'México',
            'state' => 'Coahuila',
            'city' => 'Torreón'
        ]);

        DB::table('addresses')->insert([
            'customer_id' => 2,
            'street' => 'Francia',
            'external_number' => '509',
            'internal_number' => '12',
            'between_streets' => 'Las Etnias y calle España',
            'postal_code' => '27057',
            'neighborhood' => 'Las Etnias',
            'country' => 'México',
            'state' => 'Coahuila',
            'city' => 'Torreón'
        ]);
    }
}
