<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'tradename'=> 'DNL',
                'address'=> 'cra lejos # 3- cuadras cerca',
                'phone'=> '314256568',
                'talents_id'=>1,
            ],
           
        ]);
    }
}
