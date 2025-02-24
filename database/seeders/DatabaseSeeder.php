<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Destination;
use App\Models\Facility;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(DestinationSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(ActivitySeeder::class);
        $this->call(FacilitySeeder::class);
        $this->call(DestinationImageSeeder::class);
    }
}
