<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
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
            'nombreComercial'=> (string)$company->tradename,
            'Dirección'=>(string)$company->address,
            'teléfono'=>(string)$company->phone,
            'régimenFiscal'=> (string)$company->taxRegime,
            //'actividadPrincipal'=> (string)$company->mainActivity,
            'registrolegal'=>(string)$company->legalRegistration,
            'naturalezaJurídica'=>(string)$company->legalNature,
            'registroImpuestos' =>(string)$company->taxRegistration,
            'documentoRepresentativo'=> (string)$company->representativeDocument,
            'registroComercial'=> (string)$company->commercialRegister,
            'fechaEliminacion' => isset($company->deleted_at) ? (string) $company->deleted_at : null,
            'sectorEconomico'=> (int)$company->economicSectors_id,
        ];
    }
    public static function originalAttribute($index)
    {
        $attributes = [
            'Identificador' =>'id',
            'nombreComercial'=> 'tradename',
            'Dirección'=>'address',
            'teléfono'=>'phone',
            'régimenFiscal'=> 'taxRegime',
            //'actividadPrincipal'=> 'mainActivity',
            'registrolegal'=>'legalRegistration',
            'naturalezaJurídica'=>'legalNature',
            'registroImpuestos' =>'taxRegistration',
            'documentoRepresentativo'=> 'representativeDocument',
            'registroComercial'=> 'commercialRegister',
            'fechaEliminacion' => 'deleted_at',
            'sectorEconomico'=> 'economicSectors_id',
            
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' =>'Identificador',
            'tradename'=> 'nombreComercial',
            'address'=>'Dirección',
            'phone'=>'teléfono',
            'taxRegime'=> 'régimenFiscal',
            //'mainActivity'=>'actividadPrincipal' ,
            'legalRegistration' =>'registrolegal',
            'legalNature'=>'naturalezaJurídica',
            'taxRegistration' =>'registroImpuestos',
            'representativeDocument'=> 'documentoRepresentativo',
            'commercialRegister'=> 'registroComercial',
            'deleted_at'=> 'fechaEliminacion',
            'economicSectors_id'=> 'sectorEconomico',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
