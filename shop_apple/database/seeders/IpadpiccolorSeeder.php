<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductPhoto;

class IpadpiccolorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $product_photos = [
            5 => [ // ProductID 1 (e.g., iPhone 16)
                21 => '/ipad/10/10_blue.png',
                22 => '/ipad/10/10_pink.png',
                23 => '/ipad/10/10_silver.png',
                24 => '/ipad/10/10_yellow.png',
            ],
            6 => [ // ProductID 1 (e.g., iPhone 16)
                26 => '/ipad/air6-11/air6_11_blue.png',
                27 => '/ipad/air6-11/air6_11_purple.png',
                28 => '/ipad/air6-11/air6_11_spacegray.png',
                29 => '/ipad/air6-11/air6_11_starlight.png',
            ],
            7 => [ // ProductID 1 (e.g., iPhone 16)
                31 => '/ipad/air6-13/air6_13_blue.png',
                32 => '/ipad/air6-13/air6_13_purple.png',
                33 => '/ipad/air6-13/air6_13_spacegray.png',
                34 => '/ipad/air6-13/air6_13_starlight.png',
            ],
            8 => [ // ProductID 1 (e.g., iPhone 16)
                36 => '/ipad/pro-11/proM4_11_silver.png',
                37 => '/ipad/pro-11/proM4_11_spaceblack.png',
            ],
            9 => [ // ProductID 1 (e.g., iPhone 16)
                41 => '/ipad/pro-13/proM4_11_silver.png',
                42 => '/ipad/pro-13/proM4_11_spacblack.png',
            ]
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
