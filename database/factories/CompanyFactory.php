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
            "tradename"=> fake()->name(),
            "address'"=> fake()->address(),
            "phone"=> fake()->phone,
            "taxRegime"=>fake()->taxRegime,
            "mainActivity" =>fake()->mainActivity,
            "legalRegistration" =>fake()->legalRegistration,
            "legalNature"=>fake()->legalNature,
            "taxRegistration"=>fake()->taxRegistration,
            "representativeDocument"=>fake()->representativeDocument,
            "commercialRegister"=>fake()->commercialRegister,
            
        ];
    }
}
