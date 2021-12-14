<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        // Comando que criou esse factory: php artisan make:factory ProdutoFactory --model=Models\User
    ];
});
