<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Talent;
use App\Models\Category;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'categories_id',
        'talents_id'
    ];
    
    public $timestamps = false;
    protected $dates=['deleted_at'];

    public function setNameAttribute($valor)
    {
        $this->attributes['name'] = strtolower($valor);
    }
    public function getNameAttribute($valor)
    {
        return mb_strtoupper($valor);
    }

    public function talents ()
    {
        return $this->hasMany(Talent::class); //Relationship One To Many
    }

    public function categories ()
    {
        return $this->hasMany(Category::class); //Relationship One To Many
    }
}
