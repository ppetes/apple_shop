<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            IphonepiccolorSeeder::class,
            ProductCategorySeeder::class,
            ProductSeeder::class,
            ProductVariantsSeeder::class,
            PromotionSeeder::class,
        ]);
    }
}
