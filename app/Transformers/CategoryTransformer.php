<?php

namespace App\Transformers;

use App\Models\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Category $categoria)
    {
        return [
            "identificador" => (int)$categoria->id,
            'categoria' => (string)$categoria->name,
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('categoria.show', $categoria->id),
                ]
            ]
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'identificador' => 'id',
            'categoria' => 'name',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'identificador',
            'name' => 'categoria',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
