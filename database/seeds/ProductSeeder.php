<?php

use App\Product;
use Faker\Factory;
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
        // Product::truncate();
        $faker = Factory::create();

        for ($i = 0; $i < 20; $i++) {
            $product = new Product();
            $id = $i + 1;
            $product->name = $faker->sentence(1, true);
            $product->picture = "img/products/{$id}.jpg";
            $product->description = $faker->text(500);
            $product->price = $faker->numberBetween(100, 500) * 100;
            $product->stock = $faker->numberBetween(1, 100);
            $product->save();
        }
        
        //factory(App\Product::class, 50)->create();
    }
}
