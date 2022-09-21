<?php

namespace App\Transformers;

use App\Models\Idea;
use League\Fractal\TransformerAbstract;

class IdeaTransformer extends TransformerAbstract
{

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Idea $idea )
    {
        return [
            "identificador" => (int)$idea->id,
            'idea' => (string)$idea->name,
            'detalle'=>(string)$idea->description,
            'talento'=> (int)$idea->talents_id,
            [
                'rel' => 'self',
                'href' => route('idea.show', $idea->id),
            ]
        ];
    }
    public static function originalAttribute($index)
    {
        $attributes = [
            'identificador' => 'id',
            'idea' => 'name',
            'detalle' => 'description',
            'talento' => 'talents_id',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'identificador',
            'name' => 'linea',
            'description'=> 'detalle',
            'talents_id'=> 'talento',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
