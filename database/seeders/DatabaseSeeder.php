<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategories;
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

        $user = User::factory()->admin()->create([
            'email' => 'test@example.com',
        ]);

        User::factory(100)->create();

        $category1 = Category::create([
            'name' => 'Fashion'
        ]);
        $category2 = Category::create([
            'name' => 'Phone'
        ]);
        $category3 = Category::create([
            'name' => 'Computer'
        ]);
        $category4 = Category::create([
            'name' => 'Book'
        ]);
        $category5 = Category::create([
            'name' => 'Clothes'
        ]);

        $product1 = Product::create([
            'name' => 'iPhone X',
            'desc' => 'Description',
            'price' => 10000000
        ]);
        $product2 = Product::create([
            'name' => 'Toshiba Sattelite L735',
            'desc' => 'Description',
            'price' => 14000000
        ]);
        $product3 = Product::create([
            'name' => 'Poco X3',
            'desc' => 'Description',
            'price' => 3000000
        ]);

        ProductCategories::create([
            'product_id' => $product1->id,
            'category_id' => $category2->id
        ]);
        ProductCategories::create([
            'product_id' => $product2->id,
            'category_id' => $category3->id
        ]);
        ProductCategories::create([
            'product_id' => $product3->id,
            'category_id' => $category2->id
        ]);

    }
}
