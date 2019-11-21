<?php

use Illuminate\Database\Seeder;

class LoansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loans')->insert([
            'customer_id' => 1,
            'credit_id' => 1,
            'years_to_pay' => 3,
            'payment_type' => 2,
            'interest_rate' => 15,
            'loan_amount' => 10000,
            'total_amount_to_pay' => 14500,
            'loan_date' => '2019-08-12'
        ]);
    }
}
