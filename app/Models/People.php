<?php

namespace App\Models;

use App\Models\User;
use App\Models\TypeDocument;
use App\Models\Talent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class People extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'document',
        'phone',
        'typeDocument_id',
        
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        
    ];
    public function setNameAttribute($valor)
    {
        $this->attributes['name'] = strtolower($valor);
    }
    public function getNameAttribute($valor)
    {
        return mb_strtoupper($valor);
    }
    public function setEmailAttribute($valor)
    {
        $this->attributes['email'] = strtolower($valor);
    }


    protected $table = 'people';
    public $timestamps = false;
    protected $dates=['deleted_at'];
   

    /**
     * Get the post that owns the comment.
     */
    public function documentType()
    {
        return $this->belongsTo(TypeDocument::class, 'typeDocument_id'); // Relationship One To Many (inverse)/Belongs to
    }

    public function user()
    {
        return $this->hasOne(User::class, 'people_id'); // Relationship one to one 
    }   

    public function talents()
    {
        return $this->hasOne(Talent::class);  // Relationship one to one 
    }



    

}
