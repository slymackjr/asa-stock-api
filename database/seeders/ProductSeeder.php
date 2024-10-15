<?php
// Database/Seeders/ProductSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'productName' => 'Product1',
                'partNumber' => Str::random(10),
                'shelfLocation' => 'Shelf1',
                'price' => 1234,
                'quantity' => 10,
            ],
            [
                'productName' => 'Product2',
                'partNumber' => Str::random(10),
                'shelfLocation' => 'Shelf2',
                'price' => 2345,
                'quantity' => 20,
            ],
            [
                'productName' => 'Product3',
                'partNumber' => Str::random(10),
                'shelfLocation' => 'Shelf3',
                'price' => 3456,
                'quantity' => 30,
            ],
            [
                'productName' => 'Product4',
                'partNumber' => Str::random(10),
                'shelfLocation' => 'Shelf4',
                'price' => 4567,
                'quantity' => 40,
            ],
            [
                'productName' => 'Product5',
                'partNumber' => Str::random(10),
                'shelfLocation' => 'Shelf5',
                'price' => 5678,
                'quantity' => 50,
            ],
            [
                'productName' => 'Product6',
                'partNumber' => Str::random(10),
                'shelfLocation' => 'Shelf6',
                'price' => 6789,
                'quantity' => 60,
            ],
            [
                'productName' => 'Product7',
                'partNumber' => Str::random(10),
                'shelfLocation' => 'Shelf7',
                'price' => 7890,
                'quantity' => 70,
            ],
            [
                'productName' => 'Product8',
                'partNumber' => Str::random(10),
                'shelfLocation' => 'Shelf8',
                'price' => 8901,
                'quantity' => 80,
            ],
            [
                'productName' => 'Product9',
                'partNumber' => Str::random(10),
                'shelfLocation' => 'Shelf9',
                'price' => 9012,
                'quantity' => 90,
            ],
            [
                'productName' => 'Product10',
                'partNumber' => Str::random(10),
                'shelfLocation' => 'Shelf10',
                'price' => 1012,
                'quantity' => 100,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
