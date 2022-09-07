<?php

namespace Database\Factories;

use App\Models\Ally;
use App\Models\Line;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Line>
 */
class LineFactory extends Factory
{
    protected $model = Line::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => fake()->name(),
            "description" => fake()->description,
            "talents_id"=> function(){
                return Ally::all()->random();
            }

        ];
    }
}
