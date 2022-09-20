<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EconomicActivity;
use App\Models\Company;
use App\Transformers\EconomicSectorTransformer;

class EconomicSector extends Model
{
    use HasFactory;

    protected $table = 'economicSectors';
    public $timestamps = false;
    public $transformer=EconomicSectorTransformer::class;

    protected $fillable = [
        'name',
    ];
    public function setNameAttribute($valor)
    {
        $this->attributes['name'] = strtolower($valor);
    }
    public function getNameAttribute($valor)
    {
        return mb_strtoupper($valor);
    }

    public function economicActivities()
    {
        return $this->belongsTo(EconomicActivity::class); // Relationship One To Many (inverse)/Belongs to
    }
    public function companies()
    {
        return $this->belongsTo(Company::class); // Relationship One To Many (inverse)/Belongs to
    }
}
