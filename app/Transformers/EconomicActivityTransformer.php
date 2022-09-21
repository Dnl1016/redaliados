<?php

namespace App\Transformers;

use App\Models\EconomicActivity;
use League\Fractal\TransformerAbstract;

class EconomicActivityTransformer extends TransformerAbstract
{

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(EconomicActivity $actividad)
    {
        return [
            "identificador" => (int)$actividad->id,
            'actividadEconomica' => (string)$actividad->name,
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('.show', $actividad->id),
                ]
            ]
        ];
    }
    public static function originalAttribute($index)
    {
        $attributes = [
            'identificador' => 'id',
            'sectorEconomico' => 'name',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'identificador',
            'name' => 'sectorEconomico',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
