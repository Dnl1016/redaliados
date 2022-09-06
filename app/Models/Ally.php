<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Line;

class Ally extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'document',
        'phone',
        'address',
        'nodeName',
        'region',
        'formatiionCenter',
        'lines_id',   
    ];

    public function users()
    {
        return $this->hasMany(User::class); // One to many (inverse)
    }

    public function lines()
    {
        return  $this->hasMany(Line::class); // One to many (inverse)
    }
}
