<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\People;

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

    protected $table = 'talents';

    public function people()
        {
            return $this->belongsTo(People::class);
        }

    public function companies()
        {
            return $this->hasOne(Company::class, 'talents_id');
        }

}
