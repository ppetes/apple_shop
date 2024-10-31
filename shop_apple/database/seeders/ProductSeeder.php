<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            ['ProductID' => 1, 'ProductName' => 'iPhone 16', 'ProductCategoryID' => 1, 'Photo' => '/image/iphone_16_all.png'],
            ['ProductID' => 2, 'ProductName' => 'iPhone 16 Plus', 'ProductCategoryID' => 1, 'Photo' => '/image/iphone_16_Plus.png'],
            ['ProductID' => 3, 'ProductName' => 'iPhone 16 Pro', 'ProductCategoryID' => 1, 'Photo' => '/image/iphone_16_pro.png'],
            ['ProductID' => 4, 'ProductName' => 'iPhone 16 Pro Max', 'ProductCategoryID' => 1, 'Photo' => '/image/iphone-16-pro-finish-select-2024.png'],
            ['ProductID' => 5, 'ProductName' => 'iPad 10', 'ProductCategoryID' => 2, 'Photo' => '/image/ipad-10th-gen-finish-unselect-ga.png'],
            ['ProductID' => 6, 'ProductName' => 'iPad Air 6 11 inch', 'ProductCategoryID' => 2, 'Photo' => '/image/ipad-air-finish-unselect-gallery.png'],
            ['ProductID' => 7, 'ProductName' => 'iPad Air 6 13 inch', 'ProductCategoryID' => 2, 'Photo' => '/image/ipad-air-finish-unselect-gallery (1).png'],
            ['ProductID' => 8, 'ProductName' => 'iPad Pro M4 11 inch', 'ProductCategoryID' => 2, 'Photo' => '/image/ipad-pro-finish-unselect-gallery (1).png'],
            ['ProductID' => 9, 'ProductName' => 'iPad Pro M4 13 inch', 'ProductCategoryID' => 2, 'Photo' => '/image/ipad-pro-finish-unselect-gallery.png'],
            ['ProductID' => 10, 'ProductName' => 'MacBook Air M3 13 inch GPU 10 Core 8GB Ram', 'ProductCategoryID' => 3, 'Photo' => '/image/Macboook_Air_M3_13_inch.png'],
            ['ProductID' => 11, 'ProductName' => 'MacBook Air M3 13 inch GPU 10 Core 16GB Ram', 'ProductCategoryID' => 3, 'Photo' => '/image/Macboook_Air_M3_13_inch.png'], // Adjusted the path if necessary
            ['ProductID' => 12, 'ProductName' => 'MacBook Air M3 13 inch GPU 10 Core 24GB Ram', 'ProductCategoryID' => 3, 'Photo' => '/image/Macboook_Air_M3_13_inch.png'], // Adjusted the path if necessary
            ['ProductID' => 13, 'ProductName' => 'MacBook Pro M3 14 inch M3 GPU 10 Core 8GB Ram', 'ProductCategoryID' => 3, 'Photo' => '/image/Macboook_Air_M3_13_inch.png'], // Adjusted the path if necessary
            ['ProductID' => 14, 'ProductName' => 'MacBook Pro M3 14 inch M3 GPU 10 Core 16GB Ram', 'ProductCategoryID' => 3, 'Photo' => '/image/Macboook_Air_M3_13_inch.png'], // Adjusted the path if necessary
            ['ProductID' => 15, 'ProductName' => 'MacBook Pro M3 14 inch M3 GPU 10 Core 24GB Ram', 'ProductCategoryID' => 3, 'Photo' => '/image/Macboook_Air_M3_13_inch.png'], // Adjusted the path if necessary
            ['ProductID' => 16, 'ProductName' => 'Apple Watch Series 10 42mm GPS', 'ProductCategoryID' => 4, 'Photo' => '/image/Aluminium.png'],
            ['ProductID' => 17, 'ProductName' => 'Apple Watch Series 10 42mm Cellular', 'ProductCategoryID' => 4, 'Photo' => '/image/Aluminium.png'],
            ['ProductID' => 18, 'ProductName' => 'Apple Watch Series 10 46mm GPS', 'ProductCategoryID' => 4, 'Photo' => '/image/Aluminium.png'],
            ['ProductID' => 19, 'ProductName' => 'Apple Watch Series 10 46mm Cellular', 'ProductCategoryID' => 4, 'Photo' => '/image/Aluminium.png'],
            ['ProductID' => 20, 'ProductName' => 'AirPods 4', 'ProductCategoryID' => 5, 'Photo' => '/image/airpods_4.png'],
            ['ProductID' => 21, 'ProductName' => 'AirPods 4 ANC', 'ProductCategoryID' => 5, 'Photo' => '/image/airpods_4_ANC.png'], // Adjusted the path if necessary
            ['ProductID' => 22, 'ProductName' => 'AirPods Pro 2', 'ProductCategoryID' => 5, 'Photo' => '/image/airpods_pro_2.png'], // Adjusted the path if necessary
            ['ProductID' => 23, 'ProductName' => 'AirPods Max', 'ProductCategoryID' => 5, 'Photo' => '/image/Airpods_Max_All.png'], // Adjusted the path if necessary
            ['ProductID' => 24, 'ProductName' => 'Apple TV 4K WiFi', 'ProductCategoryID' => 6, 'Photo' => '/image/apple_tv_4k.png'],
            ['ProductID' => 25, 'ProductName' => 'Apple TV 4K WiFi + Ethernet', 'ProductCategoryID' => 6, 'Photo' => '/image/apple_tv_4k.png'], // Adjusted the path if necessary
            ['ProductID' => 26, 'ProductName' => 'Apple Pencil Pro', 'ProductCategoryID' => 7, 'Photo' => '/image/Pencil_pro.png'],
            ['ProductID' => 27, 'ProductName' => 'Apple Pencil type C', 'ProductCategoryID' => 7, 'Photo' => '/image/Pencil_type_C.png'],
            ['ProductID' => 28, 'ProductName' => 'Studio Display', 'ProductCategoryID' => 7, 'Photo' => '/image/Studio_Display.png'],
            ['ProductID' => 29, 'ProductName' => 'Multiport Digital AV', 'ProductCategoryID' => 7, 'Photo' => '/image/Multiport.png'],
            ['ProductID' => 30, 'ProductName' => 'Adapter 35W', 'ProductCategoryID' => 7, 'Photo' => '/image/35W_Adapter.png'],
            ['ProductID' => 31, 'ProductName' => 'Adapter 70W', 'ProductCategoryID' => 7, 'Photo' => '/image/70W_Adapter.png'],
            ['ProductID' => 32, 'ProductName' => 'Thunbolt 4 Pro 1.8m', 'ProductCategoryID' => 7, 'Photo' => '/image/Thunderbolt_1.8m.png'],
            ['ProductID' => 33, 'ProductName' => 'Thunbolt 4 Pro 3m', 'ProductCategoryID' => 7, 'Photo' => '/image/Thunderbolt_3m.png']
        ];

        foreach ($products as $entry) {
            Product::create([
                'ProductID' => $entry['ProductID'],
                'ProductName' => $entry['ProductName'],
                'ProductCategoryID' => $entry['ProductCategoryID'],
                'Photo' => $entry['Photo'],
            ]);
        }
    }
}
