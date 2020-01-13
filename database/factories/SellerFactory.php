<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Seller;
use Faker\Generator as Faker;

$factory->define(Seller::class, function (Faker $faker) {
    $user = \App\User::where('roles','seller')->inRandomOrder()->first();
    return [
        'user_id' => $user->id,
        'register_number' => $faker->bothify('####???'),
        'business_address'=>$faker->address,
        'business_phone_number'=>$faker->phoneNumber
    ];
});
