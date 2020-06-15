<?php

namespace App\Http\Requests\Address;

use Illuminate\Foundation\Http\FormRequest;

class AddAddressRequest extends FormRequest
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
            'name'               => 'required',
            'mobile_number'      => 'required',
            'address'            => 'required',
            'city'               => 'required',
            'district'           => 'required',
            'idno'               => 'required|min:11',
        ];
    }
}
