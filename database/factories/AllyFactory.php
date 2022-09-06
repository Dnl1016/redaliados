<?php

namespace Database\Factories;

use App\Models\Ally;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ally>
 */
class AllyFactory extends Factory
{
    protected $model = Ally::class;

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
            'status' => fake()->randomElement(['activo', 'inactivo']),
            "phone"=> fake()->phoneNumber,
            "address"=>fake()->address,
            "nodeName" =>fake()->nodeName,
            "region" =>fake()->state,
            "formatiionCenter"=>fake()->formatiionCenter,
        ];
    }
}

