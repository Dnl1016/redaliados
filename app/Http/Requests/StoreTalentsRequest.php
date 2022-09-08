<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTalentsRequest extends FormRequest
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
            "jobTittle" =>'required',
            "businessName"=>'required',
            "indrustyRegistration"=> 'required',
            "typeTalents"=>'required',
            "educationalLevel"=> 'required',
            "productDescription"=> 'required',
            "people_id"=> 'required'
        ];
    }
}
