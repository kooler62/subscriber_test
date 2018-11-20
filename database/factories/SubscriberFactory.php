<?php

use Faker\Generator as Faker;
use App\Subscriber;

$factory->define(Subscriber::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName(),
        'email' => $faker->email(),
        'is_subscribed' => 1,
        'link_id' => $faker->uuid(),
    ];
});
