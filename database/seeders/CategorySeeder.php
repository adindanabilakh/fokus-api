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
    public function run()
    {
        Category::insert([
            ['name' => 'Kuliner', 'description' => 'Kategori makanan dan minuman'],
            ['name' => 'Fashion', 'description' => 'Kategori pakaian dan aksesoris'],
            ['name' => 'Teknologi', 'description' => 'Kategori produk digital dan elektronik'],
        ]);
    }
}
