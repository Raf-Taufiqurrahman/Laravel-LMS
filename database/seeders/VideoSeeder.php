<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i < 50; $i++){
            Video::create([
                'series_id' => rand(1, 9),
                'name' => 'video '.$i,
                'slug' => 'video-'.$i,
                'episode' => $i,
                'intro' => rand(0,1),
                'duration' => '00:20:00',
                'video_code' => Str::random(6),
            ]);
        }
    }
}
