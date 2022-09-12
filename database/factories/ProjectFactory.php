<?php

namespace Database\Factories;

use App\Models\Status;
use App\Models\Idea;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    protected $model = Project::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name"=> fake()->companySuffix,
            "description" => fake()->paragraphs(),
            "starDate" => now(),
            "updateDate" => now(),
            "remissionDate"=> now(),
            "status_id" => function(){
                return Status::all()->random();
            },
            "ideas_id" => function(){
                return Idea::all()->random();
            },    
        ];
    }
}
