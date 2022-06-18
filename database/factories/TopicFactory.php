<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Topic;
use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;

$factory->define(Topic::class, function (Faker $faker) {
    
    $fileRealPath = UploadedFile::fake()->create('tempfilename.pdf', 10)->store('public/image');
    
    return [
        'user_id' => factory(App\User::class),
        'title' => $faker->unique()->realText(20),
        'travel_destination' => $faker->prefecture,
        'image_path' => $fileRealPath,
        'body' => $faker->realText(100),
        'created_at' => $faker->datetime($max = 'now', $timezone = date_default_timezone_get()),
        'updated_at' => $faker->datetime($max = 'now', $timezone = date_default_timezone_get()),
    ];
});
