<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ally;

class Line extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function allies()
    {
        return $this->belongsTo(Ally::class); // Relationship One To Many (inverse)/Belongs to
    }
}
