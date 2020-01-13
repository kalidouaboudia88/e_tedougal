<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;


$factory->define(Product::class, function (Faker $faker) {
    $image_search_tableau = ['laptop','water','shoes',"cars","electronics","cars","clothes"];
    //On recupere un commercant au hasard
    $seller = App\Seller::all()->random(1)->first();
    $category = App\Category::all()->random(1)->first();
    return [
        'name'          => $faker->words(2,true),
        'description'   => $faker->paragraphs(3,true),
        'price'         => $faker->numberBetween(100, 9999999),
        'images'        => "https://source.unsplash.com/1600x900/?".array_rand($image_search_tableau),
        'seller_id'     => $seller->id,
        'category_id'   => $category->id
    ];
});
