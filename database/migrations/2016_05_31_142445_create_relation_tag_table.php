<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iz_tag_map_article', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id')->unsigned()->index();
            $table->foreign('article_id')->references('id')->on('iz_articles')->onDelete('cascade');   //外键
            $table->integer('tag_id')->unsigned()->index();
            $table->foreign('tag_id')->references('id')->on('iz_tags')->onDelete('cascade');
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
        Schema::drop('iz_tag_map_article');
    }
}
