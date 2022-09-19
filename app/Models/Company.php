<?php

namespace App\Models;

use App\Models\Talent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Transformers\CompanyTransformer;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'tradename',
        'address',
        'phone',
        'taxRegime',
        'mainActivity',
        'legalRegistration',
        'legalNature',
        'taxRegistration',
        'representativeDocument',
        'commercialRegister',
        'talents_id',
    ];
    public function setTradeNameAttribute($valor)
    {
        $this->attributes['tradename'] = strtolower($valor);
    }
    public function getTradeNameAttribute($valor)
    {
        return mb_strtoupper($valor);
    }

    protected $table = 'companies';
    public $timestamps = false;
    public $transformer=CompanyTransformer::class;
    protected $dates=['deleted_at'];

    public function talents()
        {
            return $this->belongsTo(Talent::class, 'talents_id'); //  Relationship one to one (inverse)
        }

}




