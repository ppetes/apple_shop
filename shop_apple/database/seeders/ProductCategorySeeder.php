<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        $product_categories = [
            [
                'ProductCategoryID' => 1,
                'CategoryName' => 'iPhone', 
            ],
            [
                'ProductCategoryID' => 2,
                'CategoryName' => 'iPad', 
            ],
            [
                'ProductCategoryID' => 3,
                'CategoryName' => 'Macbook', 
            ],
            [
                'ProductCategoryID' => 4,
                'CategoryName' => 'Apple Watch', 
            ],
            [
                'ProductCategoryID' => 5,
                'CategoryName' => 'AirPods', 
            ],
            [
                'ProductCategoryID' => 6,
                'CategoryName' => 'Apple TV', 
            ],
            [
                'ProductCategoryID' => 7,
                'CategoryName' => 'Apple Pencil', 
            ],
            [
                'ProductCategoryID' => 8,
                'CategoryName' => 'Accessories', 
            ],
        ];
        
        foreach ($product_categories as $entry) {
            $porduct_categories = ProductCategory::create([    // What is that ????
                'ProductCategoryID' => $entry['ProductCategoryID'],
                'CategoryName' => $entry['CategoryName'],
            ]);
        }
    }
}