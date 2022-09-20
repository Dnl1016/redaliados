<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Talent;
use App\Transformers\IdeaTransformer;


class Idea extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    public $transformer=IdeaTransformer::class;

    protected $fillable = [
        'name',
        'description',
        'talents_id',
    ];
    public function setNameAttribute($valor)
    {
        $this->attributes['name'] = strtolower($valor);
    }
    public function getNameAttribute($valor)
    {
        return mb_strtoupper($valor);
    }

    public function projects()
    {
        return $this->hasMany(Project::class); //Relationship One To Many
    
    }
    public function talents ()
    {
        return $this->hasMany(Talent::class); //Relationship One To Many
    }


}
