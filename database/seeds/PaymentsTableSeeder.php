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
            'payment_number' => 1,
            'payment_date' => '2019-09-19',
            'amount_to_pay' => 402.7,
            'interest' => 520,
            'amortized_capital' => 922.7,
            'final_capital' => 1000
        ]);

        DB::table('payments')->insert([
            'loan_id' => 1,
            'payment_number' => 3,
            'payment_date' => '2019-09-19',
            'amount_to_pay' => 402.7,
            'interest' => 520,
            'amortized_capital' => 922.7,
            'final_capital' => 1000
        ]);

        DB::table('payments')->insert([
            'loan_id' => 1,
            'payment_number' => 3,
            'payment_date' => '2019-09-19',
            'amount_to_pay' => 402.7,
            'interest' => 520,
            'amortized_capital' => 922.7,
            'final_capital' => 1000
        ]);
    }
}
