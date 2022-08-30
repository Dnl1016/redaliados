<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class typeDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('typeDocuments')->insert([
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

