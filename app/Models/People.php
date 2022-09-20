<?php

namespace App\Models;

use App\Models\User;
use App\Models\TypeDocument;
use App\Models\Talent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Transformers\PeopleTransformer;

class People extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'document',
        'phone',
        'created_at',
        'updated_at',
        'typeDocument_id',
        
    ];

    protected $hidden = [
        
        
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
    protected $dates=['deleted_at'];
    public $transformer=PeopleTransformer::class;
    
   

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
