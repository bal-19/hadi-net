<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            "role" => "Super Admin",
            "name" => "Vivi Maria",
            "gender" => "female",
            "age" => 25,
            "address" => "Junggo Street",
            "phone_number" => "08253991552",
            "email" => "vivi.mar@gmail.com",
            "password" => Hash::make("vvMaria123"),
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
