<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('credit_bureaus_id')->unsigned();
            $table->string('institution_name', 100);
            $table->integer('credit_type');
            $table->text('description');
            $table->boolean('status')->default(1);
            $table->integer('behavior');
            $table->timestamps();
            $table->foreign('credit_bureaus_id')->references('id')->on('credit_bureaus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credits');
    }
}
