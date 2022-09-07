<?php

namespace App\Models;

use App\Models\User;
use App\Models\TypeDocument;
use App\Models\Talent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

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

    protected $table = 'people';
   

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
