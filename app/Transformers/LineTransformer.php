<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Line;

class LineTransformer extends TransformerAbstract
{
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Line $linea)
    {
        return [
            "identificador" => (int)$linea->id,
            'linea' => (string)$linea->name,
            'detalle'=>(string)$linea->description,
            'aliado' => (int)$linea->allies_id,
            'links' =>[
                [
                    'rel' => 'self',
                    'href' => route('linea.show', $linea->id),
                ],
            ], 
        ];
    }
    public static function originalAttribute($index)
    {
        $attributes = [
            'identificador' => 'id',
            'linea' => 'name',
            'detalle' => 'description',
            'aliado' => 'allies_id',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'identificador',
            'name' => 'linea',
            'description'=> 'detalle',
            'allies_id'=> 'aliado',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
   
}
