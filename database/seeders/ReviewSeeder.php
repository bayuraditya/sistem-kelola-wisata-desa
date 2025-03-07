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
        for ($i = 0; $i < 5; $i++) {
            for ($j = 1; $j < 10; $j++) {
                Review::create([
                    'email' => $faker->unique()->safeEmail,
                    'name' => $faker->name,
                    'rating' => $faker->numberBetween(1, 5),
                    'review' => $faker->sentence(10),
                    'status' => $faker->randomElement(['declined', 'accepted','pending']),
                    'destination_id' => $j, // Sesuaikan dengan jumlah destinasi yang ada
                ]);
            }
        }
    }
}
