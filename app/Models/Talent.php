<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\People;
use App\Models\Company;

class Talent extends Model
{
    use HasFactory;

    protected $fillable = [
        'jobTittle',
        'people_id',
        'businessName',
        'indrustyRegistration',
        'typeTalent',
        'educationalLevel',
        'productDescription',
        'announcement',
        
    ];
    public function setJobTittleAttribute($valor)
    {
        $this->attributes['jobTittle'] = strtolower($valor);
    }
    public function getNameAttribute($valor)
    {
        return mb_strtoupper($valor);
    }

    public $timestamps = false;

    protected $table = 'talents';

    public function people()
    {
        return $this->belongsTo(People::class); // Relationship one to one  (inverse)/Belongs to
    }

    public function companies()
    {
        return $this->hasOne(Company::class, 'talents_id'); // Relationship one to one 
    }

    public function ideas()
    {
        return $this->belongsTo(TypeDocument::class); // Relationship One To Many (inverse)/Belongs to
    }

    public function skills()
    {
        return $this->belongsTo(Skill::class); // Relationship One To Many (inverse)/Belongs to
    }

}
