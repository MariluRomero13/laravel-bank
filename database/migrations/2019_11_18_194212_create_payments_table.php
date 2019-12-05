<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('loan_id')->unsigned();
            $table->integer('payment_number');
            $table->date('payment_date');
            $table->decimal('amount_to_pay', 8, 2);
            $table->decimal('interest', 8, 2);
            $table->decimal('amortized_capital', 8, 2);
            $table->decimal('final_capital', 8, 2);
            $table->boolean('status')->default(0);
            $table->timestamps();
            $table->foreign('loan_id')->references('id')->on('loans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
