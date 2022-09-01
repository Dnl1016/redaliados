<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "tradename"=> 'required',
            "address"=> 'required',
            "phone"=> 'required',
            // "taxRegime"=> ['required','min:8','max:100'],
            // "mainActivity"=> ['required','max:100'],
            // "legalRegistration"=> ['required','max:100'],
            // "legalNature"=> ['required','max:100'],
            // "taxRegistration"=> ['required','max:100'],
            // "representativeDocument"=> ['required','max:100'],
            // "commercialRegister"=> ['required','max:100'],
        ];
    }
}
