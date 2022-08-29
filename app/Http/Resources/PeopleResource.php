<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class PeopleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'Identificador' => $this->id,
            'Nombre'=> Str::of($this->name)->upper(),
            'Correo'=> $this->email,
            'Documento'=>$this->document,
            'Telefono'=> $this->phone,
            'Tipo documento'=>  $this->documentType->name,
            'Fecha creado'=>$this->created_at->format('Y-m-d H:i:s'),
            'Fecha actualizado'=>$this->updated_at->format('Y-m-d H:i:s')
        ];
    }

    public function with($request)
    {
        return[
            'res'=> true,
        ];
    }
}
