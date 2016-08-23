<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTalbe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iz_article', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title",100);
            $table->string("description")->nullable();
            $table->text("content");
            $table->timestamp("published_at");
            $table->integer("uid")->unsigned();
            $table->string("cover")->nullable();
            $table->tinyInteger("status")->default(0);
            $table->integer("view_count")->default(0);
            $table->integer("reply_count")->default(0);
            $table->integer("sort")->default(0);
            $table->tinyInteger("is_top")->default(0);
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
        Schema::drop('iz_article');
    }
}
