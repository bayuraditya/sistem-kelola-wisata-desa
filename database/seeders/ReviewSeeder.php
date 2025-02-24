<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Destination;
use Faker\Factory as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Ambil semua destination_id yang ada
        $destinationIds = Destination::pluck('id')->toArray();

        // Buat 10 review dummy
        for ($i = 0; $i < 10; $i++) {
            Review::create([
                'email'          => $faker->safeEmail,
                'name'           => $faker->name,
                'rating'         => $faker->numberBetween(1, 5),
                'review'         => $faker->sentence(10),
                'destination_id' => $faker->randomElement($destinationIds), // Ambil secara acak
            ]);
        }
    }
}
