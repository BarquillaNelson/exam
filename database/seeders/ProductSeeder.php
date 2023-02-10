<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coffee = Product::UpdateOrCreate([
            'title' => 'Coffee',
            'content' => 'Coffee',
            'image' => 'public/images/Coffee.jpg',
        ]);

        $coffee->category()->attach(1);

        $bagels = Product::UpdateOrCreate([
            'title' => 'Bagels',
            'content' => 'Bagels',
            'image' => 'public/images/Bagels.jpg',
        ]);

        $bagels->category()->attach(2);

        $ketchup = Product::UpdateOrCreate([
            'title' => 'Ketchup',
            'content' => 'Ketchup',
            'image' => 'public/images/Ketchup.jpg',
        ]);

        $ketchup->category()->attach(3);

        $butter = Product::UpdateOrCreate([
            'title' => 'Butter',
            'content' => 'Butter',
            'image' => 'public/images/Butter.jpg',
        ]);

        $butter->category()->attach(4);

        $pork = Product::UpdateOrCreate([
            'title' => 'Pork',
            'content' => 'Pork',
            'image' => 'public/images/Pork.jpg',
        ]);

        $pork->category()->attach(5);
    }
}
