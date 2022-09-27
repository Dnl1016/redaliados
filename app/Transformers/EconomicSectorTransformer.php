<?php

namespace App\Transformers;

use App\Models\EconomicSector;
use League\Fractal\TransformerAbstract;

class EconomicSectorTransformer extends TransformerAbstract
{

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(EconomicSector $sector)
    {
        return [
            "identificador" => (int)$sector->id,
            'sectorEconomico' => (string)$sector->name,
            'links' =>[
                [
                    'rel' => 'self',
                    'href' => route('idea.show', $sector->id),
                ],
            ],
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
