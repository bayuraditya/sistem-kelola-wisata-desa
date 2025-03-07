<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            // Buat satu username untuk digunakan di semua platform
            $place = $faker->city;
            $socialMedia = str_replace(' ', '', $place);
            Destination::create([
                'name' => $place,
                'description' => $faker->paragraph(6),
                'location' => $faker->streetAddress,
                'entry_fee' => $faker->numberBetween(1000, 500000),
                'opening_time' => $faker->time,
                'closed_time' => $faker->time,
                'handphone_number' => $faker->phoneNumber,
                'email' => $socialMedia . '@gmail.com', // Perbaiki email agar benar
                
                // Gunakan username yang sama untuk semua media sosial
                'instagram' => '@' . $socialMedia,
                'tiktok' => '@' . $socialMedia,
                'facebook' => $socialMedia,
                'youtube' => '@' . $socialMedia,

                'category_id' => $faker->numberBetween(1, 5),
                'user_id' => 1
            ]);
        }
    }
}
