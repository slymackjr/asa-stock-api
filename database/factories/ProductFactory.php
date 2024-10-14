<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'productName' => $this->faker->unique()->word,
            'partNumber' => Str::random(10),
            'shelfLocation' => $this->faker->unique()->word,
            'price' => $this->faker->randomNumber(4),
            'quantity' => $this->faker->randomNumber(2),
        ];
    }
}
