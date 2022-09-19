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
            'nombre' => (string)$skill->name,
            'detalle'=>(string)$skill->description,
            'categoria' => (int)$skill->categories_id,
            'talento'=> (int)$skill->talents_id
        ];
    }
}
