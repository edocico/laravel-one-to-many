<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {   
        $types = Type::all();
        $types_ids = $types->pluck('id');

        for($i = 0; $i < 20; $i++){
            $new_project = new Project();
            $new_project->name = $faker->sentence(4);
            $new_project->description = $faker->text(500);
            $new_project->link = 'https://github.com/edocico/'. Str::slug($new_project->name);
            $new_project->type_id = $faker->randomElement($types_ids);
            $new_project->save();
        }
    }
}
