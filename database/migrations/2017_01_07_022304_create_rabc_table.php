<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRabcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iz_admin_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('nickname');
            $table->string('password');
            $table->dateTime("register_time");
            $table->dateTime("last_login_time");
            $table->string("last_login_ip")->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('iz_role', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("display_name")->nullable();
            $table->string("description");
            $table->timestamps();
        });

        Schema::create('iz_permission', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("display_name")->nullable();
            $table->string("description");
            $table->timestamps();
        });

        Schema::create('iz_permission_role', function (Blueprint $table) {
            $table->integer("permission_id")->unsigned();
            $table->integer("role_id")->unsigned();

            $table->foreign("permission_id")->references("id")->on("iz_permission")->onDelete("cascade");   //外健
            $table->foreign("role_id")->references("id")->on("iz_role")->onDelete("cascade");

            $table->primary(['permission_id', 'role_id']);
        });

        Schema::create('iz_role_user', function (Blueprint $table) {
            $table->integer("user_id")->unsigned();
            $table->integer("role_id")->unsigned();

            $table->foreign("user_id")->references("id")->on("iz_admin_user")->onDelete("cascade");   //外健
            $table->foreign("role_id")->references("id")->on("iz_role")->onDelete("cascade");

            $table->primary(['user_id', 'role_id']);
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('iz_role');
    }
}
