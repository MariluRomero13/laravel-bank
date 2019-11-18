<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_customer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('card_id');
            $table->integer('customer_id')->unsigned();
            $table->boolean('status')->default(1);
            $table->foreign('card_id')->references('card_number')->on('cards');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_customer');
    }
}
