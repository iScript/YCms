<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'iz_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string("username",100)->nullable();
            $table->string('nickname',100)->nullable();
            $table->char("mobile",15)->unique()->nullable();
            $table->string('email',100)->unique()->nullable();
            $table->char('password', 60);
            $table->dateTime("register_time");
            $table->dateTime("last_login_time");
            $table->string("last_login_ip")->nullable();

            $table->string("avatar")->nullable();;
            $table->tinyInteger("sex")->default(0);;
            $table->string("real_name",10)->nullable();
            $table->tinyInteger("status")->default(0);

            $table->tinyInteger("register_type");
            $table->string('openid')->nullable();
            $table->string('unionid')->nullable();
            $table->string('qq_id')->nullable();
            $table->string('weibo_id')->nullable();

            $table->rememberToken();

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
        Schema::drop('users');
    }
}
