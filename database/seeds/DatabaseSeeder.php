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
            LoansTableSeeder::class,
            PaymentsTableSeeder::class,
            CreditsBureauTableSeeder::class,
            MessagesTableSeeder::class,
            CreditsTableSeeder::class,
            CardsTableSeeder::class,
            CardsCustomersTableSeeder::class
        ]);
    }
}
