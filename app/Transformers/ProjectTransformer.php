<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Project;

class ProjectTransformer extends TransformerAbstract
{    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Project $proyecto)
    {
        return [
            "identificador" => (int)$proyecto->id,
            'proyecto' => (string)$proyecto->name,
            'detalle'=>(string)$proyecto->description,
            'fechaInicio' => (string)$proyecto->starDate,
            'fechaActualizacion' => (string)$proyecto->updateDate,
            'fechaRemision' => (string)$proyecto->remissionDate,
            'fechaEliminacion' => isset($proyecto->deleted_at) ? (string) $proyecto->deleted_at : null,
            'estado' => (int)$proyecto->status_id,
            'numeroIdea'=> (int)$proyecto->aideas_id,
            [
                'rel' => 'self',
                'href' => route('proyecto.show', $proyecto->id),
            ]
        ];
    }
    public static function originalAttribute($index)
    {
        $attributes = [
            "identificador" => 'id',
            'proyecto' => 'name',
            'detalle' => 'description',
            'fechaInicio' => 'starDate',
            'fechaActualizacion' => 'updateDate',
            'fechaRemision' => 'remissionDate',
            'fechaEliminacion' =>'deleted_at',
            'estado' => 'staus_id',
            'numeroIdea'=> 'ideas_id',
            
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' =>"identificador" ,
            'name'=> 'proyecto' ,
            'description' => 'detalle',
            'starDate'=> 'fechaInicio',
            'updateDate' => 'fechaActualizacion',
            'remissionDate' => 'fechaRemision',
            'deleted_at' =>'fechaEliminacion',
            'staus_id' => 'estado',
            'ideas_id'=>'numeroIdea' ,
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
