<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 100000; $i++) {
            $products[] = [
                'name'        => $faker->sentence(3),
                'code'        => Str::random(5),
                'description' => $faker->paragraph,
                'quantity'    => $faker->randomNumber(1, 99),
                'price'       => $faker->randomFloat(2, 1, 999),
                'created_at'  => now()->subDays(rand(0,30)),
                'updated_at'  => now()->subDays(rand(0, 30)),
            ];
        }

        $chunks = \array_chunk($products, 4000);

        foreach ($chunks as $chunk) {
            Product::insert($chunk);
        }

    }
}
