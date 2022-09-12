<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;
    protected $dates=['deleted_at'];
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
