<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            // id = 1
            [
                "name" => "Điện thoại",
                "image" => "phone.png",
                "parent_id" => null,
            ],
            // id = 2
            [
                "name" => "Điện thoại iPhone",
                "image" => "iphone.png",
                "parent_id" => 1,
            ],
            // id = 3
            [
                "name" => "Điện thoại Samsung",
                "image" => "samsung.png",
                "parent_id" => 1,
            ],
            // id = 4
            [
                "name" => "Điện thoại Xiaomi",
                "image" => "xiaomi.png",
                "parent_id" => 1,
            ],
            // id = 5
            [
                "name" => "Điện thoại Samsung Galaxy A",
                "image" => "samsung.png",
                "parent_id" => 3,
            ],
            // id = 6
            [
                "name" => "Điện thoại Samsung Galaxy S",
                "image" => "samsung.png",
                "parent_id" => 3,
            ],
        ]);
        
    }
}
