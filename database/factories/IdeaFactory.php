<?php

namespace Database\Factories;
use App\Models\Idea;
use App\Models\Talent;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Idea>
 */
class IdeaFactory extends Factory
{
    protected $model = Idea::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => fake()->catchPhrase,
            "description" => fake()->paragraph(),
            "talents_id"=> function(){
                return Talent::all()->random();
            }

        ];
    }
}
