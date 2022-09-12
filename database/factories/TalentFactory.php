<?php

namespace Database\Factories;
use App\Models\People;
use App\Models\Talent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Talents>
 */
class TalentFactory extends Factory
{
    protected $model = Talent::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'jobTittle'=> fake()->jobTitle,
            'businessName'=> fake()->bs,
            'indrustyRegistration'=> fake()->swiftBicNumber,
            'typeTalents'=>fake()->randomElement(['Natural', 'Juridico']),
            'educationalLevel'=> fake()->randomElement(['Ingeniero', 'Tecnologo', 'Tecnico', 'Bachiller']),
            'productDescription'=>fake()->text($maxNbChars = 200),
            'people_id'=>  function(){
                return People::all()->random();
            }
        ];
    }
}
