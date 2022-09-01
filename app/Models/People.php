<?php

namespace App\Models;

use App\Models\TypeDocument;
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
        'type_document_id',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        //'created_at',
        //'updated_at',
        
    ];

   
    /**
     * Get the post that owns the comment.
     */
    public function documentType()
    {
        return $this->belongsTo(TypeDocument::class, 'type_document_id');
    }

}
