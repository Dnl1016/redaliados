<?php

namespace App\Transformers;

use App\Models\TypeDocument;
use League\Fractal\TransformerAbstract;

class TypeDocumentTransformer extends TransformerAbstract
{
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(TypeDocument $tipoDocumento)
    {
        return [
            "identificador" => (int)$tipoDocumento->id,
            'tipoDocumento' => (string)$tipoDocumento->name,
            'links' =>[
                [
                    'rel' => 'self',
                    'href' => route('tipoDocumento.show', $tipoDocumento->id),
                ],
            ],             
        ];
    }
    public static function originalAttribute($index)
    {
        $attributes = [
            'identificador' => 'id',
            'tipoDocumento' => 'name',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'identificador',
            'name' => 'tipoDocumento',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
