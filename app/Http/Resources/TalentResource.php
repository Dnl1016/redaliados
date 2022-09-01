<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class TalentResource extends JsonResource
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
            'Cargo'=> Str::of($this->jobTittle)->upper(),
            'Nombre Negocio' =>Str::of ($this->businessName)->upper(),
            'Registro industrial' => $this->indrustyRegistration,
            'Tipo de talento'=>$this->typeTalents,
            'Nivel educacion'=>$this->educationalLevel,
            'Descripción del Producto'=>$this-> productDescription,
            'Convocatoria' =>$this->announcement,
        ];
    }

    
    public function with($request)
    {
        return[
            'res'=>true,
        ];
    }
}
