<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TalentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        
        DB::table('talents')->insert([
            [
                'jobTittle'=> 'gerente',
                'businessName'=> 'Mangos20',
                'indrustyRegistration'=> '64576787867',
                'typeTalents'=>'Natural',
                'educationalLevel'=> 'Tecnologo',
                'productDescription'=> "Mangos grandes y sin pepas, totalmente jugosos , la mitad es biche y la otra es madura generando un nuevo sabor!"
            ],
            [
                'jobTittle'=> 'secretario',
                'businessName'=> 'biker motos',
                'indrustyRegistration'=> '6457670890',
                'typeTalents'=>'Natural',
                'educationalLevel'=> 'Tecnologo',
                'productDescription'=> "motos de alto ciladranje... dandole duro Run!"
            ],
        ]);
    }
}    

