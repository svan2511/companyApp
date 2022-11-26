<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Api;

class UserValidate extends FormRequest
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
        $rules = [ 
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required' ,
            'password' => 'required'
        ];
        return $rules;
    }

    public function messages()
    {
        return  [
            'name.required' => 'Name can not be blank.',
            'email.required' => 'Email can not be blank.',
            'phone.required' => 'Phone can not be blank.',
            'password.required' => 'Password can not be blank.',
            'email.email' => 'Email is not valid.',

            ];
    }

    protected function failedValidation(Validator $validator) {
    throw new HttpResponseException(response()->json(['errors' => $validator->errors()], 422)); 
    }
}
