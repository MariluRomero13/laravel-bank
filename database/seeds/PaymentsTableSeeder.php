<?php

use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->insert([
            'loan_id' => 1,
            'amount_to_pay' => 402.7,
            'payment_date' => '2019-09-19',
        ]);

        DB::table('payments')->insert([
            'loan_id' => 1,
            'amount_to_pay' => 402.7,
            'payment_date' => '2019-10-19',
        ]);

        DB::table('payments')->insert([
            'loan_id' => 1,
            'amount_to_pay' => 402.7,
            'payment_date' => '2019-11-19',
        ]);
    }
}
