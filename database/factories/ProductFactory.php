<?php

use Faker\Generator as Faker;


// Product Factory
$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'description' => $faker->text(100),
        'price' => $faker->randomFloat(2, 0, 999),
        'ref' => $faker->regexify('[A-Za-z0-9]{16}'),
        'discount' => $faker->boolean()
    ];
});
