<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPeople extends FormRequest
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
                "name"=> ['required','max:100'],
                "email"=> ['required',  'max:255'],
                "document"=> ['required','unique:people','min:1','max:300'],
                "phone"=> ['required','min:8','max:100'],
        ];
    }
}
