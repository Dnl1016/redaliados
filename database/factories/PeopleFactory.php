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
            "name"=> $this->faker->name(),
            "email"=> $this->faker->unique()->safeEmail,
            "document"=> $this->faker->unique(),
            "phone"=> $this->faker->phoneNumber,
            "type_document_id" => function(){
                return TypeDocument::all()->random();
            }
        ];
    }
}


