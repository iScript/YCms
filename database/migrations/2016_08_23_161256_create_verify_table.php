<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerifyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iz_verify', function (Blueprint $table) {
            $table->increments('id');

            $table->integer("uid");
            $table->tinyInteger("type")->default(1);
            $table->string("account", 100);
            $table->string("verify", 100);
            $table->string("ip", 15);
            $table->tinyInteger("state");

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
        Schema::drop('iz_verify');
    }
}
