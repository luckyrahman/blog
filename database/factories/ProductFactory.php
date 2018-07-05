<?php

use Faker\Generator as Faker;


$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name'=> $faker->name,
        'code' =>1,
        'category' => 1,
        'sub_category' => 1,
        'product_group' => 1,
        'measure_unit' => 1,
        'buying_price' => 1,
        'selling_price' => 1,
        'status' => 1,
        'description' => $faker->text,
        'product_image' => $faker->imageUrl($width = 640, $height = 480) // 'http://lorempixel.com/640/480/'
    ];
});