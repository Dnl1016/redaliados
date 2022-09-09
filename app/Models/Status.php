<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
class Status extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'status';

    protected $fillable = [
        'name',
        'description',
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
        return  $this->hasMany(Project::class); // Relationship One To Many
    }


}
