<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Status;

class StatusTransformer extends TransformerAbstract
{
   
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Status $estado)
    {
        return [
            "identificador" => (int)$estado->id,
            'estado' => (string)$estado->name,
            'detalle'=>(string)$estado->description,
            'links' =>[
                [
                    'rel' => 'self',
                    'href' => route('estado.show', $estado->id),
                ],
            ], 
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'identificador' => 'id',
            'estado' => 'name',
            'detalle' => 'description',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'identificador',
            'name' => 'estado',
            'description'=> 'detalle',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
