<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Promotion;

class PromotionSeeder extends Seeder
{
    public function run()
    {
        $promotion = [
            [
                'PromotionID' => 1,
                'GetX' => 26,
                'BuyX' => 6,
            ],
            [
                'PromotionID' => 2,
                'GetX' => 26,
                'BuyX' => 7,
            ],
            [
                'PromotionID' => 3,
                'GetX' => 26,
                'BuyX' => 8,
            ],
            [
                'PromotionID' => 4,
                'GetX' => 26,
                'BuyX' => 9,
            ],
            [
                'PromotionID' => 5,
                'GetX' => 20,
                'BuyX' => 10,
            ],
            [
                'PromotionID' => 6,
                'GetX' => 20,
                'BuyX' => 11,
            ],
            [
                'PromotionID' => 7,
                'GetX' => 20,
                'BuyX' => 12,
            ],
            [
                'PromotionID' => 8,
                'GetX' => 20,
                'BuyX' => 13,
            ],
            [
                'PromotionID' => 9,
                'GetX' => 20,
                'BuyX' => 14,
            ],
            [
                'PromotionID' => 10,
                'GetX' => 20,
                'BuyX' => 15,
            ],
        ];

        foreach ($promotion as $entry) {
            $promotions = Promotion::create([
                'PromotionID' => $entry['PromotionID'],
                'GetX' => $entry['GetX'],
                'BuyX' => $entry['BuyX'],
            ]);
        }
    }
}
