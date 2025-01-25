<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            [
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
            ],
            [
                "role" => "Admin",
                "name" => "Tono Sigura",
                "gender" => "male",
                "age" => 30,
                "address" => "Pesanggrahan, Kota Batu",
                "phone_number" => "08678312332",
                "email" => "sigura.tn@gmail.com",
                "password" => Hash::make("ton123"),
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "role" => "Technician",
                "name" => "Edi Satria",
                "gender" => "male",
                "age" => 48,
                "address" => "Junggo Street",
                "phone_number" => "081531331552",
                "email" => "edi.junggo@gmail.com",
                "password" => Hash::make("ediJunior"),
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "role" => "User",
                "name" => "Harunkun Etyav",
                "gender" => "other",
                "age" => 18,
                "address" => "Beji",
                "phone_number" => "081556715532",
                "email" => "run.kun@gmail.com",
                "password" => Hash::make("kezet123"),
                "created_at" => now(),
                "updated_at" => now()
            ],
        ]);
    }
}
