<?php

namespace Database\Factories;

use App\Models\People;
use App\Models\TypeDocument;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\People>
 */
class PeopleFactory extends Factory
{
    protected $model = People::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name"=> fake()->name(),
            "email"=> fake()->unique()->safeEmail,
            "document"=> fake()->unique()->randomNumber($nbDigits = NULL, $strict = false),
            "phone"=> fake()->phoneNumber(),
            "typeDocument_id" => function ()
            {
                return  TypeDocument::all()->random()->id;
            }
        ];
    }
}


