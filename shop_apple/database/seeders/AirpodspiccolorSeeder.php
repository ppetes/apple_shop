<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductPhoto;

class AirpodspiccolorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $product_photos = [
            20 => [ // ProductID 1 (e.g., iPhone 16)
                153 => '/airpods/4/airpods_4.png'
            ],
            21 => [ // ProductID 1 (e.g., iPhone 16)
                154 => '/airpods/4ANC/airpods_4_ANC.png'
            ],
            22 => [ // ProductID 1 (e.g., iPhone 16)
                155 => '/airpods/Pro2/airpods_pro_2.png'
            ],
            23 => [ // ProductID 1 (e.g., iPhone 16)
                156 => '/airpods/Max/airpods_max_black.png',
                157 => '/airpods/Max/airpods_max_blue.png',
                158 => '/airpods/Max/airpods_max_orange.png',
                159 => '/airpods/Max/airpods_max_purple.png',
                160 => '/airpods/Max/airpods_max_starlight.png'
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
