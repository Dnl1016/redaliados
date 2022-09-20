<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Status;
use App\Models\Idea;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Transformers\ProjectTransformer;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'starDate',
        'updateDate',
        'remissionDate',
        'status_id',
        'ideas_id',
    ];

    public $timestamps = false;
    protected $dates=['deleted_at'];
    public $transformer=ProjectTransformer::class;

    public function setNameAttribute($valor)
    {
        $this->attributes['name'] = strtolower($valor);
    }
    public function getNameAttribute($valor)
    {
        return mb_strtoupper($valor);
    }

    public function status()
    {
        return $this->belongsTo(Status::class); // Relationship One To Many (inverse)/Belongs to
    }

    public function ideas()
    {
        return $this->belongsTo(Idea::class); // Relationship One To Many (inverse)/Belongs to
    }
}

