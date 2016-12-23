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

$factory->define(Store\Product::class, function (Faker\Generator $faker) {

    return [
        'reference' => $faker->regexify('\W\W\W\d\d\d\d\d\d'),
        'name' => $faker->name,
        'description' => $faker->paragraph(),
        'type' => $faker->randomElement([
            'Earrings',
            'Rings',
            'Necklaces',
            'Bracelets'
        ]),
        'collection' => $faker->randomElement([
            'Sweetness',
            'Organic',
            'Optimistic',
            'Geometric',
            'Exotic',
            'Engagement',
            'Confidence',
            'Comfort',
            'Balance'
        ])
    ];
});
