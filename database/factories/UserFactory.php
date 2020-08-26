<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
// 头像假数据
$avatars = [
    'https://cdn.learnku.com/uploads/images/201710/14/1/s5ehp11z6s.png',
    'https://cdn.learnku.com/uploads/images/201710/14/1/Lhd1SHqu86.png',
    'https://cdn.learnku.com/uploads/images/201710/14/1/LOnMrqbHJn.png',
    'https://cdn.learnku.com/uploads/images/201710/14/1/xAuDMxteQy.png',
    'https://cdn.learnku.com/uploads/images/201710/14/1/ZqM7iaP4CR.png',
    'https://cdn.learnku.com/uploads/images/201710/14/1/NDnzMutoxX.png',
];
$factory->define(User::class, function (Faker $faker)use($avatars) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('admin888'),
        'avatar' => $faker->randomElement($avatars),
        'introduction' => $faker->sentence(),
        'remember_token' => Str::random(10),
    ];
});
