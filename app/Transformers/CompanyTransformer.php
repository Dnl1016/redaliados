<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use Illuminate\Support\Str;
use App\Models\Company;

class CompanyTransformer extends TransformerAbstract
{
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Company $company)
    {
        return [
            'Identificador' => (int)$company->id,
            'nombreComercial'=> Str::of($this->tradename)->upper(),
            'Dirección'=> $this->address,
            'teléfono'=>$this->phone,
            'régimen fiscal'=> $this->taxRegime,
            'actividad principal'=>  $this->mainActivity,
            'registro legal'=>$this->legalRegistration,
            'naturaleza jurídica'=>$this->legalNature,
            'registro de impuestos' => $this->taxRegistration,
            'documento representativo'=> $this-> representativeDocument,
            'registro comercial'=> $this->commercialRegister
        ];
    }
}
