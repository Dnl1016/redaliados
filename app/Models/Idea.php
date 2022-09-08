<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Talent;

class Idea extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class); //Relationship One To Many
    
    }
    public function talents ()
    {
        return $this->hasMany(Talent::class); //Relationship One To Many
    }


}
