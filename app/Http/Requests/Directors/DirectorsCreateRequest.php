<?php

namespace App\Http\Requests\Directors;

use Illuminate\Foundation\Http\FormRequest;

class DirectorsCreateRequest extends FormRequest
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
            'company_id'=>'required',
            'nic'=>'required',
            'landline'=>'required',
            'mobile'=>'required',
            'email'=>'required',
            'title'=>'required',
            'full_name'=>'required',
            'occupation'=>'required',
            'ds_division'=>'required',
            'gs_division'=>'required',
            'postal_code'=>'required',
            'residential_address'=>'required',
            'flag'=>'required',
        ];
    }
}
