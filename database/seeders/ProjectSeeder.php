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
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
        }
        foreach (config('projects.projects') as $project) {
            
                        $newproject = new Project();
                        $newproject->title = $project['title'];
                        $newproject->slug = Project::generateSlag($newproject->title);
                        // $newproject->slug = $project['slug'];
                        // $project->cover_image = 'placeholders/' . $faker->image('storage/app/public/placeholders', 600, 300, 'Project', false, false);
                        $newproject->cover_image = 'placeholders/' . $faker->image('storage/app/public/placeholders', 600, 300, 'Project', false, false); //placeholders/sjfdposjadfgpojsdpfo.png
                        
                        // $project->cover_image = $project($cover_image);
                        $newproject->source_code = $project['source_code'];
                        $newproject->project_link = $project['project_link'];
                        $newproject->save();
            }
        }
}
