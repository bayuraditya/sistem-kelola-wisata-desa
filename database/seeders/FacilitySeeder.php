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
        
        // Ambil semua destination_id yang ada agar activity terkait dengan destination yang valid
        $destinationIds = Destination::pluck('id')->toArray();

        // Membuat 10 data activity dummy
        for ($i = 0; $i < 10; $i++) {
            Facility::create([
                'name'           => $faker->sentence(3),
                'description'    => $faker->paragraph,
                'image'          => '1740231944_67b9d508bca11.png',
                'destination_id' => $faker->randomElement($destinationIds),
            ]);
        }
    }
}
