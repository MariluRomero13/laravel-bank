<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->string('street', 50);
            $table->string('external_number', 10)->nullable();
            $table->string('internal_number', 10)->nullable();
            $table->text('between_streets');
            $table->string('postal_code', 10);
            $table->string('neighborhood', 100);
            $table->string('country', 50);
            $table->string('state', 50);
            $table->string('city', 50);
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
