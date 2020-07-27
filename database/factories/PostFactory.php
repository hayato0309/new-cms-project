<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        // phpの容量のエラーが出て実行できない。
        // 以前にfakerを使用したときには問題なかったので何が原因かわからない。
        'user_id' => factory('App\Post'),
        'title' => $faker->sentence(),
        'post_image' => $faker->imageUrl('900','300'),
        'body' => $faker->paragraph()
    ];
});
