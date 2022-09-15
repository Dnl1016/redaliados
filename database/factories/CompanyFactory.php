<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    protected $model = Company::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "tradename"=> fake()->catchPhrase,
            "address"=> fake()->address(),
            "phone"=> fake()->e164PhoneNumber,
            "taxRegime"=>fake()->bs,
            "mainActivity" =>fake()->bs,
            "legalRegistration" =>fake()->name(),
            "legalNature"=>fake()->name(),
            "taxRegistration"=>fake()->bs,
            "representativeDocument"=>fake()->bs,
            "commercialRegister"=>fake()->swiftBicNumber,
        ];
    }
}
