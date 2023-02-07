<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $videos = Video::factory(100)->make();
        $videos = $videos->sortBy('created_at');
        $users = User::all();
        foreach ($videos as $video){
            $video->user_id = $users->random()->id;
            $video->save();
        }
    }
}
