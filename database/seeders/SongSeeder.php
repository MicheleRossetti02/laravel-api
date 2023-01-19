<?php

namespace Database\Seeders;

use App\Models\Song;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('songs.song') as $song) {
            $newsong = new Song();
            $newsong->title = $song['title'];
            $newsong->slug = Song::generateSlag($newsong->title);
            // $newsong->slug = $song['slug'];
            $newsong->album = $song['album'];
            $newsong->artist = $song['artist'];
            $newsong->save();
        }
    }
}
