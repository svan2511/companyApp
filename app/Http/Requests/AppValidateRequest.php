<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AppValidateRequest extends FormRequest
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
        $currentAction = substr( Route::currentRouteAction() , strpos(Route::currentRouteAction() , '@')+1);
        $rules =[ 'title' => 'required','description' => 'required','img' => 'required|mimes:jpg,jpeg,png' , 'price' => 'required'];
        if ($currentAction === "update" &&  Request::file('img')==null) {
            unset($rules['img']);
        }
        return $rules;
    }

    public function messages()
    {
        return  [
            'title.required' => 'Title can not be blank.',
            'description.required' => 'Description can not be blank.',
            'price.required' => 'Price can not be blank.',
            'mimes' => 'Image should be only in JPG,JPEG and PNG formate.',
            'img.required' => 'Image can not be blank.',

            ];
    }
}
