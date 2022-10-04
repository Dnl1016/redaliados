<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;


class UserTransformer extends TransformerAbstract
{
   
    public function transform(User $user)
    {
        return [
            'identificador' => (int)$user->id,
            'correo' => (string)$user->email,
            'esVerificado' => (int)$user->verified,
            'esAdministrador' => ($user->admin === 'true'),
            'fechaCreacion' => (string)$user->created_at,
            'fechaActualizacion' => (string)$user->updated_at,
            'fechaEliminacion' => isset($user->deleted_at) ? (string) $user->deleted_at : null,
            'persona' => (int)$user->people_id,
            'aliado'=> (int)$user->allies_id,
            'estado'=>(string)$user->status,
            'links' =>[
                [
                    'rel' => 'self',
                    'href' => route('usuario.show', $user->id),
                ],
            ], 
        ];
    }
    public static function originalAttribute($index)
    {
        $attributes = [
            'identificador' => 'id',
            'correo' => 'email',
            'esVerificado' => 'verified',
            'esAdministrador' => 'admin',
            'fechaCreacion' => 'created_at',
            'fechaActualizacion' => 'updated_at',
            'fechaEliminacion' => 'deleted_at',
            'persona' => 'people_id',
            'aliado'=> 'allies_id',
            'estado'=>'status'
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' =>'identificador',
            'email' => 'correo',
            'verified' => 'esVerificado',
            'admin' => 'esAdministrador',
            'created_at' => 'fechaCreacion',
            'updated_at' => 'fechaActualizacion',
            'deleted_at' => 'fechaEliminacion',
            'people_id' => 'persona',
            'allies_id'=> 'aliado',
            'status'=>'estado',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
    
}
