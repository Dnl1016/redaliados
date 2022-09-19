<?php

namespace App\Transformers;

use App\Models\Talent;
use League\Fractal\TransformerAbstract;

class TalentTransformer extends TransformerAbstract
{
   
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Talent $talento)
    {
        return [
            "identificador" => (int)$talento->id,
            'cargo' => (string)$talento->jobTittle,
            'nombreNegocio' => (string)$talento->businessName,
            'registroIndustrial'=>(string)$talento->indrustyRegistration,
            'tipoTalento'=> (string)$talento->typeTalent,
            'nivelEducacion' =>(string)$talento->educationalLevel,
            'descripcionProducto' => (string)$talento->productDescription,
            'convocatoria' => (string)$talento->announcement,
            'persona' => (int)$talento->people_id,
        ];
    }
}

