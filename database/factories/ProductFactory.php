<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'picture' => $faker->imageUrl(600, 500),
        'name' => $faker->sentence(1, true),
        'price' => $faker->numberBetween($min = 10000, $max = 200000),
    ];
});
