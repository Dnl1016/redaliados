<?php

namespace Database\Factories;
use App\Models\People;
use App\Models\Talent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Talents>
 */
class TalentsFactory extends Factory
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
            'jobTittle'=> fake()->jobTittle,
            'businessName'=> fake()->businessName,
            'indrustyRegistration'=> fake()->businessName,
            'typeTalents'=>fake()->randomElement(['Natural', 'Juridico']),
            'educationalLevel'=> fake()->randomElement(['Ingeniero', 'Tecnologo', 'Tecnico', 'Bachiller']),
            'productDescription'=>fake()->productDescription,
            'people_id'=>  function(){
                return People::all()->random();
            }
        ];
    }
}
