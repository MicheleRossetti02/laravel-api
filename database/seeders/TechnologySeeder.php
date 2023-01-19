<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $technologies = ['itunes', 'spotify', 'youtube', 'deezer'];

        foreach ($technologies as $technology) {
            $newTecnology = new Technology();
            $newTecnology->name = $technology;
            // $newTecnology->slug = Str::Slug($newTecnology->title);
            $newTecnology->save();
        }
    }
}
