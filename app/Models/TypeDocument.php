<?php

namespace App\Models;

use App\Models\People;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDocument extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    protected $table = 'type_documents';
    

    public function peoples()
    {
        return  $this->hasMany(People::class); // relacion muchos a uno
    }
    
}
