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
        $categories = [
            ['name' => 'Beach'],
            ['name' => 'Waterfall'],
            ['name' => 'Hiking'],
            ['name' => 'Pool'],
            ['name' => 'Lake'],
            ['name' => 'River'],
            ['name' => 'Nigth Marker'],
            ['name' => 'Rice Terrace'],
            ['name' => 'Savana'],
            ['name' => 'Mountain'],
            ['name' => 'Coffe Shop'],
        ];

        foreach ($categories as $categories) {
            Category::create($categories);
        }
    
    }
}
