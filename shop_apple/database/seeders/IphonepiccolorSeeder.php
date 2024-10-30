<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductPhoto;

class IphonepiccolorSeeder extends Seeder
{
    public function run()
    {
        // Define product photos with ProductID as the key and an array of VariantID => photo_path pairs
        $product_photos = [
            1 => [ // ProductID 1 (e.g., iPhone 16)
                1 => '/iphone/16/16_blue.png',
                2 => '/iphone/16/16_green.png',
                3 => '/iphone/16/16_pink.png',
                4 => '/iphone/16/16_white.png',
                5 => '/iphone/16/16_black.png',
            ],
            2 => [ // ProductID 2 (e.g., iPhone 16 Plus)
                6 => '/iphone/16Plus/16pl_blue.png',
                7 => '/iphone/16Plus/16pl_green.png',
                8 => '/iphone/16Plus/16pl_pink.png',
                9 => '/iphone/16Plus/16pl_white.png',
                10 => '/iphone/16Plus/16pl_black.png',
            ],
            // You can add additional products and their corresponding variants here
        ];

        // Ensure the ProductID values exist in the products table
        $existingProductIDs = \DB::table('products')->pluck('ProductID')->toArray();

        foreach ($product_photos as $productID => $variants) {
            if (in_array($productID, $existingProductIDs)) {
                foreach ($variants as $variantID => $photoPath) {
                    ProductPhoto::create([
                        'ProductID' => $productID,
                        'VariantID' => $variantID,
                        'photo_path' => $photoPath,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}