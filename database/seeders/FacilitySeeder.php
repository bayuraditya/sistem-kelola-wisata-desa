<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;
use App\Models\Facility;
use Faker\Factory as Faker;

class FacilitySeeder extends Seeder
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

        $destinationIds = Destination::pluck('id')->toArray();
        for ($i = 1; $i <= 5; $i++) {
            for ($j = 1; $j < 40; $j++) {
                Facility::create([
                    'name'           => $faker->sentence(3),
                    'description'    => $faker->paragraph(2),
                    'image'          => $faker->randomElement($images), // Pilih gambar secara acak
                    'destination_id' => $j,
                ]);
            }
        }
    }
}
