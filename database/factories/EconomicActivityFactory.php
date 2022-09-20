<?php

namespace Database\Factories;
use App\Models\EconomicActivity;
use App\Models\EconomicSector;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skill>
 */
class SkillFactory extends Factory
{
    protected $model = EconomicActivity::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => fake()->catchPhrase,
            "economicSectors_id"=> function(){
                return EconomicSector::all()->random();
            }
        ];
    }
}