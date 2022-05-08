<?php

namespace Database\Seeders;

use App\Models\Series;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i < 10; $i++){
            Series::create([
                'user_id' => 1,
                'name' => 'Series '.$i,
                'slug' => 'series-'.$i,
                'description' => 'Description '.$i,
                'cover' => 'image-'.$i.'.jpg',
                'status' => 1,
                'level' => 'Intermidiate',
                'price' => rand(100000, 300000),
            ]);
        }
    }
}
