<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Skill;
use App\Transformers\CategoryTransformer;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',  
    ];
    public $timestamps = false;
    public $transformer=CategoryTransformer::class;

    public function setNameAttribute($valor)
    {
        $this->attributes['name'] = strtolower($valor);
    }
    public function getNameAttribute($valor)
    {
        return mb_strtoupper($valor);
    }
    
    public function skills()
    {
        return $this->belongsTo(Skill::class); // Relationship One To Many (inverse)/Belongs to
    }
}
