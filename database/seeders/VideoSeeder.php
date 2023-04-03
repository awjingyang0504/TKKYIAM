<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::create([
            'participant_id' => '1',
            'video_link' => 'https://www.youtube.com/embed/h1n6kPZhmOc',
            'file' => '1647326046.pdf',
        ]);
        Video::create([
            'participant_id' => '2',
            'video_link' => 'https://www.youtube.com/embed/FT0GKCuSaW0',
            'file' => '1647326046.pdf',
        ]);
        Video::create([
            'participant_id' => '3',
            'video_link' => 'https://www.youtube.com/embed/9lnh--ZOPyo',
            'file' => '1647326046.pdf',
        ]);
        Video::create([
            'participant_id' => '4',
            'video_link' => 'https://www.youtube.com/embed/10ict3GCxGY',
            'file' => '1647326046.pdf',
        ]);
        Video::create([
            'participant_id' => '5',
            'video_link' => 'https://www.youtube.com/embed/2IOl1htRC5A',
            'file' => '1647326046.pdf',
        ]);
        Video::create([
            'participant_id' => '6',
            'video_link' => 'https://www.youtube.com/embed/0jqxkDfmvYo',
            'file' => '1647326046.pdf',
        ]);
        Video::create([
            'participant_id' => '7',
            'video_link' => 'https://www.youtube.com/embed/AS4q9yaWJkI',
            'file' => '1647326046.pdf',
        ]);
        Video::create([
            'participant_id' => '8',
            'video_link' => 'https://www.youtube.com/embed/8EVUrD1etHs',
            'file' => '1647326046.pdf',
        ]);
        Video::create([
            'participant_id' => '9',
            'video_link' => 'https://www.youtube.com/embed/HYrVKLBhitE',
            'file' => '1647326046.pdf',
        ]);
        Video::create([
            'participant_id' => '10',
            'video_link' => 'https://www.youtube.com/embed/6doKKoHQmTI',
            'file' => '1647326046.pdf',
        ]);
    }
}
