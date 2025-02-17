<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//         // 
// id	name	description	location	entry_fee	opening_time	closed_time	handphone_number	email	instagram	tiktok	facebook	youtube	category_id	user_id	created_at	updated_at
        $destinations = [
            [
                'name' => 'ABC waterfall',
                'description' => 'best view waterfall',
                'location' => 'br. tegal',
                'entry_fee' => 20000,
                'opening_time' => '08:00',
                'closed_time' => '18:00',
                'handphone_number' => '073182921',
                'email' => 'abcwaterfall@gmail.com',
                'instagram' => '@abcwaterfall',
                'tiktok' => '@abcwaterfall',
                'facebook' => 'abcwaterfall',
                'youtube' => 'abcwaterfall',
                'category_id' => 2,
                'user_id' => 1,
            ],
            [
                'name' => 'Pantai A',
                'description' => 'best view beach',
                'location' => 'br. asri',
                'entry_fee' => 5000,
                'opening_time' => '07:00',
                'closed_time' => '23:00',
                'handphone_number' => '032182921',
                'email' => 'pantaia@gmail.com',
                'instagram' => '@pantai_a',
                'tiktok' => '@pantai_a',
                'facebook' => 'pantai_a',
                'youtube' => 'pantai_a',
                'category_id' => 1,
                'user_id' => 1,
            ],
            
        ];


        foreach ($destinations as $destinations) {
            Destination::create($destinations);
        }

    }
}
