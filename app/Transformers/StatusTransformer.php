<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Status;

class StatusTransformer extends TransformerAbstract
{
   
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Status $estado)
    {
        return [
            "identificador" => (int)$estado->id,
            'nombre' => (string)$estado->name,
            'detalle'=>(string)$estado->description,
        ];
    }
}
