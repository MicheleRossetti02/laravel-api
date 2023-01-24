<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('projects.projects') as $project) {
            $newproject = new Project();
            $newproject->title = $project['title'];
            $newproject->slug = Project::generateSlag($newproject->title);
            // $newproject->slug = $project['slug'];
            $newproject->source_code = $project['source_code'];
            $newproject->project_link = $project['project_link'];
            $newproject->save();
        }
    }
}
