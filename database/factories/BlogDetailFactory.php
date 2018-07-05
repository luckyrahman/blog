<?php

use Faker\Generator as Faker;

$factory->define(App\BlogDetail::class, function (Faker $faker) {
    return [
        'blog_id' => factory(App\Blog::class),
        'author'=> $faker->name,
        'tags'=> 'tag1',
        'upload_file'=> $faker->imageUrl($width = 640, $height = 480) // 'http://lorempixel.com/640/480/'
    ];
});
