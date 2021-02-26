<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Lesson;
use Faker\Generator as Faker;

$factory->define(Lesson::class, function (Faker $faker) {
    //明日から１０日後までの間でランダムな日時を生成する
    $startAt = $faker->dateTimeBetween('+1 days', '+10 days');
    $startAt->setTime(10, 0, 0);
    $endAt = clone $startAt;
    $endAt->setTime(11, 0, 0);

    return [
        'name' => $faker->name,
        'coach_name' => $faker->name,
        'capacity' => $faker->randomNumber(2),
        'start_at' => $startAt->format('Y-m-d H:i:s'),
        'end_at' => $endAt->format('Y-m-d H:i:s'),
    ];
});
