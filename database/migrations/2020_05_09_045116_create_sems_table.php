<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('total_amount')->nullable();
            $table->string('paid_amount')->nullable();
            $table->string('request_amount')->nullable();
            $table->boolean('status')->default('0');
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
        Schema::dropIfExists('sems');
    }
}
