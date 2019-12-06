<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            CustomersTableSeeder::class,
            AddressTableSeeder::class,
            PlacesTableSeeder::class,
            CreditsTableSeeder::class,
            CreditsBureauTableSeeder::class,
            MessagesTableSeeder::class,
            CardsTableSeeder::class
        ]);
    }
}
