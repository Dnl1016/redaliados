<?php

namespace Database\Factories;
use App\Models\EconomicSector;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EconomicSector>
 */
class EconomicSectorFactory extends Factory
{
    protected $model = EconomicSector::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => fake()->catchPhrase,  
        ];
    }
}
