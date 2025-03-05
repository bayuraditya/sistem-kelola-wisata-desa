<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use Faker\Factory as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Review::create([
                'email' => $faker->unique()->safeEmail,
                'name' => $faker->name,
                'rating' => $faker->numberBetween(1, 5),
                'review' => $faker->sentence(10),
                'status' => $faker->randomElement(['declined', 'accepted','pending']),
                'destination_id' => $faker->numberBetween(1, 10), // Sesuaikan dengan jumlah destinasi yang ada
            ]);
        }
    }
}
