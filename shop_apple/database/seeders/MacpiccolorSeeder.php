<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductPhoto;

class MacpiccolorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $product_photos = [
            10 => [ // ProductID 1 (e.g., iPhone 16)
                46 => '/mac/macair/mba13.png',
                51 => '/mac/macair/mba13.png'
            ],
            11 => [ // ProductID 1 (e.g., iPhone 16)
                56 => '/mac/macair/mba13.png',
                61 => '/mac/macair/mba13.png'
            ],
            12 => [ // ProductID 1 (e.g., iPhone 16)
                66 => '/mac/macair/mba13.png',
                71 => '/mac/macair/mba13.png'
            ],
            13 => [ // ProductID 1 (e.g., iPhone 16)
                76 => '/mac/macpro/mbp14.png',
                81 => '/mac/macpro/mbp14.png'
            ],
            14 => [ // ProductID 1 (e.g., iPhone 16)
                86 => '/mac/macpro/mbp14.png',
                91 => '/mac/macpro/mbp14.png'
            ],
            15 => [ // ProductID 1 (e.g., iPhone 16)
                96 => '/mac/macpro/mbp14.png',
                101 => '/mac/macpro/mbp14.png'
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
