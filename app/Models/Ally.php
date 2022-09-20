<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Line;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Transformers\AllyTransformer;

class Ally extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = false;
    protected $dates=['deleted_at'];
    public $transformer=AllyTransformer::class;

    protected $fillable = [
        'name',
        'email',
        'document',
        'phone',
        'address',
        'nodeName',
        'region',
        'formationCenter',
           
    ];

    public function setNameAttribute($valor)
    {
        $this->attributes['name'] = strtolower($valor);
    }
    public function getNameAttribute($valor)
    {
        return mb_strtoupper($valor);
    }

    public function setNodeNameAttribute($valor)
    {
        $this->attributes['nodeName'] = strtolower($valor);
    }
    public function getNodeNameAttribute($valor)
    {
        return mb_strtoupper($valor);
    }

    public function setEmailAttribute($valor)
    {
        $this->attributes['email'] = strtolower($valor);
    }

    public function users()
    {
        return $this->hasMany(User::class); // One to many (inverse)
    }

    public function lines()
    {
        return  $this->hasMany(Line::class, "allies_id"); // One to many (inverse)
    }
}
