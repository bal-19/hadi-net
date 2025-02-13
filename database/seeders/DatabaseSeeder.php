<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            // Users table
            DB::table("users")->insert([
                [
                    "role" => $faker->randomElement(['super admin', 'admin', 'technician', 'user']),
                    "name" => $faker->name,
                    "gender" => $faker->randomElement(['male', 'female', 'other']),
                    "born_date" => $faker->dateTimeBetween('-100 years', '-18 years')->format('Y-m-d'),
                    "address" => $faker->address,
                    "phone_number" => $faker->phoneNumber,
                    "email" => $faker->unique()->safeEmail,
                    "password" => Hash::make('password'),
                    "created_at" => now(),
                    "updated_at" => now()
                ]
            ]);
        }

        // Packages table
        DB::table("packages")->insert([
            [
                "name" => "Paket 10 Mbps",
                "bandwidth" => 10,
                "duration" => 1,
                "price" => 50000,
                "desc" => "Paket paling murah dengan kecepatan internet yang mantap dengan harga yang murah",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "name" => "Paket 25 Mbps",
                "bandwidth" => 25,
                "duration" => 1,
                "price" => 120000,
                "desc" => "Paket dengan penjualan paling banyak yang menawarkan kecepatan internet yang cepat dengan harga yang terjangkau",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "name" => "Paket 100 Mbps",
                "bandwidth" => 100,
                "duration" => 1,
                "price" => 225000,
                "desc" => "Paket dengan kecepatan internet tercepat dengan harga yang terjangkau untuk kaum menengah",
                "created_at" => now(),
                "updated_at" => now()
            ]
        ]);
    }
}
