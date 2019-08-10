<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'intro' => $faker->text(50),
        'content' => $faker->text(200),
        'tags' => $faker->words(5, true),	// TODO use array
        'author_id' => $faker->randomDigitNotNull(),
        'author_name' => $faker->name,
        'published' => $faker->boolean,
        'published_ts' => $faker->numberBetween(time()-10000, time())
    ];
});
