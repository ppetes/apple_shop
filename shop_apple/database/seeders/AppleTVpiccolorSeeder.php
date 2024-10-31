<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductPhoto;


class AppleTVpiccolorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $product_photos = [
            24 => [ // ProductID 1 (e.g., iPhone 16)
                161 => '/appletv/apple_tv_4k.png'
            ],
            25 => [ // ProductID 1 (e.g., iPhone 16)
                164 => '/appletv/apple_tv_4k.png'
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
