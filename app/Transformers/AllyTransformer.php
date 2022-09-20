<?php

namespace App\Transformers;

use App\Models\Ally;
use League\Fractal\TransformerAbstract;

class AllyTransformer extends TransformerAbstract
{
   
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Ally $aliado)
    {
        return [
            "identificador" => (int)$aliado->id,
            'aliado' => (string)$aliado->name,
            'correo' => (string)$aliado->email,
            'documento'=>(string)$aliado->document,
            'telefono'=>(string)$aliado->phone,
            'dirección'=>(string)$aliado->address,
            'nodo' =>(string)$aliado->nodeName,
            'region'=>(string)$aliado->region,
            'centroFormacion'=>(string)$aliado->formationCenter,
            'fechaEliminacion' => isset($aliado->deleted_at) ? (string) $aliado->deleted_at : null,
        ];
    }
    public static function originalAttribute($index)
    {
        $attributes = [
            "identificador" => 'id',
            'aliado' => 'name',
            'correo' => 'email',
            'documento'=>'document',
            'telefono'=>'phone',
            'dirección'=>'address',
            'nodo' =>'nodeName',
            'region'=>'region',
            'centroFormacion'=>'formationCenter',
            'fechaEliminacion' =>'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'identificador',
            'name' => 'aliado',
            'email' => 'correo' ,
            'document'=>'documento',
            'phone'=>'telefono',
            'address'=>'dirección',
            'nodeName' =>'nodo',
            'region'=>'region',
            'formationCenter'=>'centroFormacion',
            'deleted_at' =>'fechaEliminacion',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
