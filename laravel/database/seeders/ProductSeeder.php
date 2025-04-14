<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                "name" => "Samsung Galaxy S24 Ultra 5G 128GB",
                "slug" => "samsung-galaxy-s24-ultra-5g-128gb",
                "image" => "s24-ultra.png",
                "price" => 26700000,
                "sale_price" => null,
                "quantity" => 10,
                "category_id" => 6
            ],
            [
                "name" => "Xiaomi 14T Pro 5G 512GB",
                "slug" => "xiaomi-14t-pro-5g-512gb",
                "image" => "14t-pro.png",
                "price" => 18240000,
                "sale_price" => 13240000,
                "quantity" => 3,
                "category_id" => 4
            ],
        ]);
        
    }
}
