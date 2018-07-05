<?php

use Faker\Generator as Faker;

$factory->define(App\Blog::class, function (Faker $faker) {
    return [
        'title'=> 'Test Title'.$faker->randomDigit,
        'description' =>$faker->text,
        'status' => 1
    ];
});
