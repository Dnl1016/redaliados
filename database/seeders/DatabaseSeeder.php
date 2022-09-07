<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\PeopleSeeder;
use App\Models\User;
use App\Models\Ally;
use App\Models\Company;
use App\Models\Idea;
use App\Models\Line;
use App\Models\People;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Study;
use App\Models\TypeDocument;
use App\Models\Talent;
use App\Models\Status;
use Database\Seeders\factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(TypeDocumentSeeder::class);
        $this->call(PeopleSeeder::class);
        $this->call(TalentSeeder::class);
        $this->call(CompanySeeder::class);
     
        TypeDocument::factory(10)->create();
        //Status::factory(3)->create();
        // Ally::factory(10)->create();
        //People::factory(10)->create();
    
        // People::factory()
        //     ->count(50)
        //     ->hasdocumentType(1)
        //     ->create();

        

        


      



    }
}
