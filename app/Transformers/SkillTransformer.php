<?php

namespace App\Transformers;
use App\Models\Skill;
use League\Fractal\TransformerAbstract;


class SkillTransformer extends TransformerAbstract
{
   
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Skill $skill)
    {
        return [
            "identificador" => (int)$skill->id,
            'habilidad' => (string)$skill->name,
            'detalle'=>(string)$skill->description,
            'categoria' => (int)$skill->categories_id,
            'talento'=> (int)$skill->talents_id,
            'links' =>[
                [
                    'rel' => 'self',
                    'href' => route('skill.show', $skill->id),
                ],
            ], 
        ];
    }
    public static function originalAttribute($index)
    {
        $attributes = [
            'identificador' => 'id',
            'habilidad' => 'name',
            'detalle' => 'description',
            'categoria' => 'categories_id',
            'talento'=>'talents_id',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'identificador',
            'name' => 'habilidad',
            'description'=> 'detalle',
            'categories_id'=> 'categoria',
            'talents_id'=>'talento',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
