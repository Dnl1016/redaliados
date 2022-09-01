<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people')->insert([
            [
                // "name"=> $faker->name(),
                // "email"=> $faker->unique()->safeEmail,
                // "document"=> $faker->unique(),
                // "phone"=> $faker->phoneNumber,
                // "type_document_id"=> $faker->numberBetween(1,10),
                'name'=> 'Daniel David',
                'email'=> 'test@test.com',
                'document'=> '14213557',
                'phone'=> '31578956563',
                'type_document_id'=> 3,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],
            [
                'name'=> 'Juan penagos',
                'email'=> 'test2@test.com',
                'document'=> '14867867',
                'phone'=> '31575456563',
                'type_document_id'=> 2,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
            [
                'name'=> 'John pirata muñoz',
                'email'=> 'pirata@arg.com',
                'document'=> '696969696',
                'phone'=> '3157547867',
                'type_document_id'=> 1,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
            [
                'name'=> 'elba quito',
                'email'=> 'quito@elba.com',
                'document'=> '900743867',
                'phone'=> '3110656753',
                'type_document_id'=> 1,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],
            [
                'name'=> 'zacarias piedras',
                'email'=> 'zacarias@piedras.com',
                'document'=> '14007867',
                'phone'=> '31106563',
                'type_document_id'=> '1',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],
            [
                'name'=> 'elva ginazo',
                'email'=> 'elvaggina@grande.com',
                'document'=> '645707867',
                'phone'=> '3110897',
                'type_document_id'=> '1',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],
        ]);
    }
}

