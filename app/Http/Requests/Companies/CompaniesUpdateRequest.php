<?php

namespace App\Http\Requests\Companies;

use Illuminate\Foundation\Http\FormRequest;

class CompaniesUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|max:255',
            'code'=>'required|max:60',
            'objective'=>'required',
            'register_address'=>'required|max:255',
            'postal_code'=>'required|max:15',
            'ds_division'=>'required|max:60',
            'gs_division'=>'required|max:45',
            'landline'=>'required|max:15',
            'mobile'=>'required|max:15',
            'email'=>'required|email|max:80',
        ];
    }
}
