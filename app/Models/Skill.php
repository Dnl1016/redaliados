<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Talent;
use App\Models\Category;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'categories_id',
        'talents_id'
    ];

    public function talents ()
    {
        return $this->hasMany(Talent::class); //Relationship One To Many
    }

    public function categories ()
    {
        return $this->hasMany(Category::class); //Relationship One To Many
    }
}
