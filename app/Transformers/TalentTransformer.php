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
            'fechaEliminacion' => isset($talento->deleted_at) ? (string) $talento->deleted_at : null,
            'convocatoria' => (string)$talento->announcement,
            'persona' => (int)$talento->people_id,
            'links' =>[
                [
                    'rel' => 'self',
                    'href' => route('talento.show', $talento->id),
                ],
            ], 
        ];
    }
    public static function originalAttribute($index)
    {
        $attributes = [
            "identificador" => 'id',
            'cargo' => 'jobTittle',
            'nombreNegocio' => 'businessName',
            'registroIndustrial'=>'indrustyRegistration',
            'tipoTalento'=> 'typeTalent',
            'nivelEducacion' =>'educationalLevel',
            'descripcionProducto' => 'productDescription',
            'fechaEliminacion' => 'deleted_at',
            'convocatoria' => 'announcement',
            'persona' => 'people_id',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => "identificador",
            'name' => 'usuario',
            'email'=> 'correo',
            'verified' => 'esVerificado',
            'admin' => 'esAdministrador',
            'created_at' =>'fechaCreacion',
            'updated_at' => 'fechaActualizacion',
            'deleted_at' =>'fechaEliminacion',
            'people_id' =>'persona',
            'allies_id'=> 'aliado',
            'status' =>'estado',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}

