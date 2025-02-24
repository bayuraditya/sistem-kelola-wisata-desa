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

        // Ambil semua destination_id yang ada
        $destinationIds = Destination::pluck('id')->toArray();

        // Buat 10 gambar dummy
        for ($i = 0; $i < 10; $i++) {
            DestinationImage::create([
                'image'          => '1740226643_67b9c0532836d.jfif',
                'destination_id' => $faker->randomElement($destinationIds), // Ambil secara acak
            ]);
        }
    }
}
