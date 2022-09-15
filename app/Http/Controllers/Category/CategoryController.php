<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\ApiController;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends ApiController
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $categoria= Category::all();

        return $this->showAll($categoria);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
        ];

        $this->validate($request, $rules);

        $categoria = Category::create($request->all());

        return $this->showOne($categoria, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $categoria)
    {
        return $this->showOne($categoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $categoria)
    {
        $categoria->fill($request->only([
            'name'
        ]));

        if ($categoria->isClean()) {
            return $this->errorResponse('Debe especificar al menos un valor diferente para actualizar', 422);
        }

        $categoria->save();

        return $this->showOne($categoria);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $categoria)
    {
        $categoria->delete();

        return $this->showOne($categoria);
    }
}
