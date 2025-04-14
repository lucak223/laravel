<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                "name" => "Phạm Ngọc Cường",
                "email" => "cuong@gmail.com",
                "password" => Hash::make('123'),
                "role" => "admin",
            ],
            [
                "name" => "Sầm Văn Mạnh",
                "email" => "manh@gmail.com",
                "password" => Hash::make('123'),
                "role" => "user",
            ],
            [
                "name" => "Bùi Phương Nam",
                "email" => "nam@gmail.com",
                "password" => Hash::make('123'),
                "role" => "user",
            ],
        ]);
        
    }
}
