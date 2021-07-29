<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please enter your name',
            'email.required' => 'Please enter your email',
            'email.unique' => 'Provided email is already taken',
            'email.email' => 'Please enter a valid email',
            'password.required' => 'Please enter your password',
            'password.min' => 'Password too short',
            'password.confirmed' => 'Password mismatch',
            'password_confirmation.required' => 'Please re-enter your password',
        ];
    }
}
