<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class type_documentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_documents')->insert([
        [    
            'name'=> 'cedula'       
        ],
        [
            'name'=> 'pasaporte',
        ],
        [
            'name'=> 'tarjeta de indentidad',
        ]    
        ]);
    }
}

