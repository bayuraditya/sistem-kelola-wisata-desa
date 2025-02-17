<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facilities = [
            ['name' => 'toilet'],
            ['name' => 'parking'],
            ['name' => 'wifi'],
            ['name' => 'canteen'],
            ['name' => 'security'],
        ];

        foreach ($facilities as $facility) {
            Facility::create($facility);
        }
    }
}
