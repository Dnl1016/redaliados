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

   
    protected $table = 'typeDocuments';

    public function peoples()
    {
        return  $this->hasMany(People::class); // Relationship One To Many
    }
    
}
