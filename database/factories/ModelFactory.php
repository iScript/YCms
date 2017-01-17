<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

// https://github.com/fzaninotto/Faker

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    $faker = Faker\Factory::create('zh_CN');

    static $password;

    return [
        'username' => $faker->name,
        'nickname' => $faker->name,
        'mobile' =>  $faker->phoneNumber,
        'email' => $faker->unique(true)->email,
        'register_time' => $faker->dateTime(),
        'last_login_time' => $faker->dateTime(),
        'last_login_ip' => $faker->ipv4,
        'register_type' => 1,
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
        'password' => $password ?: $password = bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});



// factory(App\Models\User::class, 500)->create()