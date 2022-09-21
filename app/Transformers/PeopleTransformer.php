<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\People;

class PeopleTransformer extends TransformerAbstract
{
    
    public function transform(People $persona)
    {
        return [
            "identificador" => (int)$persona->id,
            'persona' => (string)$persona->name,
            'correo' => (string)$persona->email,
            'documento'=>(string)$persona->document,
            'telefono'=>(string)$persona->phone,
            'fechaCreacion' => (string)$persona->created_at,
            'fechaActualizacion' => (string)$persona->updated_at,
            'fechaEliminacion' => isset($persona->deleted_at) ? (string) $persona->deleted_at : null,
            'tipoDocumento'=> (int)$persona->typeDocument_id,
            [
                'rel' => 'self',
                'href' => route('persona.show', $persona->id),
            ]
        ];
    }
    public static function originalAttribute($index)
    {
        $attributes = [
            "identificador" => 'id',
            'persona' => 'name',
            'correo' => 'email',
            'documento'=>'document',
            'telefono'=>'phone',
            'fechaCreacion' => 'created_at',
            'fechaActualizacion' => 'updated_at',
            'fechaEliminacion' => 'deleted_at',
            'tipoDocumento'=> 'typeDocument_id',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id'=> "identificador" ,
            'name' => 'persona',
            'email' => 'correo',
            'document' =>'documento',
            'phone'=>'telefono',
            'created_at'=> 'fechaCreacion' ,
            'updated_at' => 'fechaActualizacion',
            'deleted_at' => 'fechaEliminacion',
            'typeDocument_id' => 'tipoDocumento',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
