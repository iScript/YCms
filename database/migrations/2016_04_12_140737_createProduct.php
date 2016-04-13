<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iz_product', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title",100);
            $table->string("description")->nullable();
            $table->text("content")->nullable();
            $table->integer("cat_id")->unsigned();
            $table->integer("uid")->unsigned();
            $table->string("picture")->nullable();
            $table->float("price");
            $table->tinyInteger("status")->default(0);
            $table->integer("sort")->default(0);
            $table->tinyInteger("is_hot")->default(0);
            $table->tinyInteger("is_recommend")->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('iz_product');
    }
}
