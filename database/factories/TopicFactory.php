<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Topic;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;

$factory->define(Topic::class, function (Faker $faker) {
    
    return [
        'user_id' => User::inRandomOrder()->first()->id,//ユーザーをランダムでピックアップする。findなど
        
        'title' => $faker->unique()->realText(20),
        'travel_destination' => $faker->prefecture,
        'image_path' => null,
        'body' => $faker->realText(100),
        'created_at' => $faker->datetime($max = 'now', $timezone = date_default_timezone_get()),
        'updated_at' => $faker->datetime($max = 'now', $timezone = date_default_timezone_get()),
    ];
});
