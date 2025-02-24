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
        
        // Ambil semua destination_id yang ada agar activity terkait dengan destination yang valid
        $destinationIds = Destination::pluck('id')->toArray();

        // Membuat 10 data activity dummy
        for ($i = 0; $i < 10; $i++) {
            Activity::create([
                'name'           => $faker->sentence(3),
                'description'    => $faker->paragraph,
                'image'          => '1740231944_67b9d508bb574.jpeg',
                'destination_id' => $faker->randomElement($destinationIds),
            ]);
        }
    }
}
