<?php

namespace App\Transformers;

use App\Models\TypeDocument;
use League\Fractal\TransformerAbstract;

class TypeDocumentTransformer extends TransformerAbstract
{
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(TypeDocument $tipoDocumento)
    {
        return [
            "identificador" => (int)$tipoDocumento->id,
            'tipoDocumento' => (string)$tipoDocumento->name,
        ];
    }
}
