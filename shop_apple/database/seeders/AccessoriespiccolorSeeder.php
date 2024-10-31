<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductPhoto;

class AccessoriespiccolorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $product_photos = [
            26 => [ // ProductID 1 (e.g., iPhone 16)
                167 => '/accessories/Pencil_pro.png'
            ],
            27 => [ // ProductID 1 (e.g., iPhone 16)
                170 => '/accessories/Pencil_type_C.png'
            ],
            28 => [ // ProductID 1 (e.g., iPhone 16)
                171 => '/accessories/Studio_Display.png'
            ],
            29 => [ // ProductID 1 (e.g., iPhone 16)
                172 => '/accessories/Multiport.png'
            ],
            30 => [ // ProductID 1 (e.g., iPhone 16)
                173 => '/accessories/35W_Adapter.png'
            ],
            31 => [ // ProductID 1 (e.g., iPhone 16)
                174 => '/accessories/70W_Adapter.png'
            ],
            32 => [ // ProductID 1 (e.g., iPhone 16)
                175 => '/accessories/Thunderbolt_1.8m.png'
            ],
            33 => [ // ProductID 1 (e.g., iPhone 16)
                176 => '/accessories/Thunderbolt_3m.png'
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
