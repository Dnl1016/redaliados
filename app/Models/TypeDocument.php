<?php

namespace App\Models;

use App\Models\People;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDocument extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name'
    ];
    
    public function setNameAttribute($valor)
    {
        $this->attributes['name'] = strtolower($valor);
    }
    public function getNameAttribute($valor)
    {
        return mb_strtoupper($valor);
    }

   
    protected $table = 'typeDocuments';
    public $timestamps = false;

    public function peoples()
    {
        return  $this->hasMany(People::class); // Relationship One To Many
    }
    
}
