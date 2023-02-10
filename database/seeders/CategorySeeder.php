<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::UpdateOrCreate([
            'title' => 'Beverages',
        ]);
        
        Category::UpdateOrCreate([
            'title' => 'Bread/Bakery',
        ]);

        Category::UpdateOrCreate([
            'title' => 'Canned/Jarred Goods',
        ]);

        Category::UpdateOrCreate([
            'title' => 'Dairy ',
        ]);

        Category::UpdateOrCreate([
            'title' => 'Meat  ',
        ]);
    }
}
