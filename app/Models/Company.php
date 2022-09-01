<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

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
        'commercialRegister'
    ];


    protected $table = 'companies';

}




