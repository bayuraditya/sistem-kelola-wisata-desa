<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DestinationImage;
use App\Models\Destination;
use Faker\Factory as Faker;

class DestinationImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Buat array images dari '1.avif' sampai '26.avif'
        $images = [];
        for ($i = 1; $i <= 26; $i++) {
            $images[] = $i . '.avif';
        }

        // Ambil semua destination_id yang ada
        $destinationIds = Destination::pluck('id')->toArray();

        for($i=0;$i<5;$i++){
            for($j=1;$j<40;$j++){
                DestinationImage::create([
                    'image'          => $faker->randomElement($images), // Pilih gambar secara acak
                    'destination_id' => $j,
                ]);
            }
        }
    }
}
