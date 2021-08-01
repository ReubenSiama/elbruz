<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDetailRequest extends FormRequest
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
            'contact' => 'required',
            'city' => 'required',
            'pin_code' => 'required',
            'state' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'contact.required' => 'Please enter your contact number',
            'city.required' => 'Please enter your city',
            'pin_code.required' => 'Provided email is already PIN Code',
            'state.required' => 'Please enter your state',
        ];
    }


}
