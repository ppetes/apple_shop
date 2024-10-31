<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductPhoto;

class WatchpiccolorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $product_photos = [
            16 => [ // ProductID 1 (e.g., iPhone 16)
                129 => '/watch/alu/w10_42_aluminum_silver.jpg',
                130 => '/watch/alu/w10_42_aluminum_rosegold.jpg',
                131 => '/watch/alu/w10_42_aluminum_silver.jpg',
                132 => '/watch/tita/w10_42_titanium_natural.jpg',
                133 => '/watch/tita/w10_42_titanium_gold.jpg',
                134 => '/watch/tita/w10_42_titanium_black.jpg'
            ],
            17 => [ // ProductID 1 (e.g., iPhone 16)
                135 => '/watch/alu/w10_42_aluminum_silver.jpg',
                136 => '/watch/alu/w10_42_aluminum_rosegold.jpg',
                137 => '/watch/alu/w10_42_aluminum_silver.jpg',
                138 => '/watch/tita/w10_42_titanium_natural.jpg',
                139 => '/watch/tita/w10_42_titanium_gold.jpg',
                140 => '/watch/tita/w10_42_titanium_black.jpg'
            ],
            18 => [ // ProductID 1 (e.g., iPhone 16)
                141 => '/watch/alu/w10_42_aluminum_silver.jpg',
                142 => '/watch/alu/w10_42_aluminum_rosegold.jpg',
                143 => '/watch/alu/w10_42_aluminum_silver.jpg',
                144 => '/watch/tita/w10_42_titanium_natural.jpg',
                145 => '/watch/tita/w10_42_titanium_gold.jpg',
                146 => '/watch/tita/w10_42_titanium_black.jpg'
            ],
            19 => [ // ProductID 1 (e.g., iPhone 16)
                147 => '/watch/alu/w10_42_aluminum_silver.jpg',
                148 => '/watch/alu/w10_42_aluminum_rosegold.jpg',
                149 => '/watch/alu/w10_42_aluminum_silver.jpg',
                150 => '/watch/tita/w10_42_titanium_natural.jpg',
                151 => '/watch/tita/w10_42_titanium_gold.jpg',
                152 => '/watch/tita/w10_42_titanium_black.jpg'
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
