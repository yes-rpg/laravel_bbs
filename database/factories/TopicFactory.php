<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Topic::class, function (Faker $faker) {
    $sentence = $faker->sentence();
    $updated_at = $faker->dateTimeThisMonth();
    $created_at = $faker->dateTimeThisMonth($updated_at);
    $user_ids = \App\Models\User::pluck('id')->toArray();
    $category_ids = \App\Models\Category::pluck('id')->toArray();
    return [
        'title' => $sentence,
        'body' => $faker->text(),
        'excerpt' => $sentence,
        'user_id' => $faker->randomElement($user_ids),
        'category_id' => $faker->randomElement($category_ids),
        'created_at' => $created_at,
        'updated_at' => $updated_at,
    ];
});
