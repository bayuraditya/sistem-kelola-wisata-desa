<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;
use App\Models\Destination;
use Faker\Factory as Faker;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 26; $i++) {
            $images[] = $i . '.avif';
        }

        // Ambil semua destination_id yang ada agar activity terkait dengan destination yang valid
        $destinationIds = Destination::pluck('id')->toArray();
        for ($i = 1; $i <= 5; $i++) {
            for ($j = 1; $j < 40; $j++) {
                Activity::create([
                    'name'           => $faker->sentence(3),
                    'description'    => $faker->paragraph(2),
                    'image'          => $faker->randomElement($images), // Pilih gambar secara acak
                    'destination_id' => $j,
                ]);
            }
        }
    }
}
