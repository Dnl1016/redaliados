<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ally;
use App\Transformers\LineTransformer;

class Line extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'allies_id'
    ];

    public $timestamps = false;
    public $transformer=LineTransformer::class;
    

    public function setNameAttribute($valor)
    {
        $this->attributes['name'] = strtolower($valor);
    }
    public function getNameAttribute($valor)
    {
        return mb_strtoupper($valor);
    }

    public function allies()
    {
        return $this->belongsTo(Ally::class); // Relationship One To Many (inverse)/Belongs to
    }
}
