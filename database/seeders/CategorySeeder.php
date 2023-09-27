<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Minerals', 'Natural', 'Wines', 'Fruits', 'Seedlings', 'Ornaments', 'Building Material', 'Automobile', 'Paint', 'Stationery', 'Machinery', 'Animal Food'];

        collect($categories)->each(fn ($category) => Category::create(['name' => $category]));
    }
}
