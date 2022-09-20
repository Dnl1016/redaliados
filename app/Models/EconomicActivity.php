<?php

namespace App\Models;
use App\Models\EconomicSector;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Transformers\EconomicActivityTransformer;

class EconomicActivity extends Model
{
    use HasFactory;
    protected $table = 'economicActivities';
    public $timestamps = false;
    public $transformer=EconomicActivityTransformer::class;

    protected $fillable = [
        'name',
        'economicSectors_id',
    ];
    public function setNameAttribute($valor)
    {
        $this->attributes['name'] = strtolower($valor);
    }
    public function getNameAttribute($valor)
    {
        return mb_strtoupper($valor);
    }

    public function economicSectors ()
    {
        return $this->hasMany(EconomicSector::class); //Relationship One To Many
    }
}
