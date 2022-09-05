<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class CompanyResource extends JsonResource
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
            "Nombre Negocio"=>Str::of($this->talents->businessName)->upper(),
            'Nombre comercial'=> Str::of($this->tradename)->upper(),
            'Dirección'=> $this->address,
            'teléfono'=>$this->phone,
            'régimen fiscal'=> $this->taxRegime,
            'actividad principal'=>  $this->mainActivity,
            'registro legal'=>$this->legalRegistration,
            'naturaleza jurídica'=>$this->legalNature,
            'registro de impuestos' => $this->taxRegistration,
            'documento representativo'=> $this-> representativeDocument,
            'registro comercial'=> $this->commercialRegister,
            
        ];
    }
    // 'tradename',
    //     'address',
    //     'phone',
    //     'taxRegime',
    //     'mainActivity',
    //     'legalRegistration',
    //     'legalNature',
    //     'taxRegistration',
    //     'representativeDocument',
    //     'commercialRegister'
    // ];
    public function with($request)
    {
        return[
            'res'=> true,
        ];
    }
}
