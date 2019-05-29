<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Thread;
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Thread::class, function (Faker $faker) {
    return [
        'user_id' => User::query()->pluck('id')->random(),
        'title' => $faker->text(10),
    ];
});
