<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\PeopleSeeder;
use App\Models\User;
use App\Models\Ally;
use App\Models\Category;
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
        TypeDocument::flushEventListeners();
        status::flushEventListeners();
        category::flushEventListeners();
        Ally::flushEventListeners();
        People::flushEventListeners();
        User::flushEventListeners();
        Talent::flushEventListeners();
        Company::flushEventListeners();
        
        // ]);
        // $this->call(TypeDocumentSeeder::class);
        // $this->call(PeopleSeeder::class);
        // $this->call(TalentSeeder::class);
        // $this->call(CompanySeeder::class);
        TypeDocument::factory(10)->create();
        Status::factory(10)->create();
        Category::factory(10)->create();
        Ally::factory(10)->create();
      
    
        People::factory(10)->create()->each(function ($people){
            User::factory()->create([
                'people_id' => $people->id

            ])->each(function($talent){
                Talent::factory(5)->create([
                    'people_id'=>$talent->id
                ]);
                Company::factory()->create([
                    'talents_id'=>$talent->id
                ]);
            });
        });

    }
}
