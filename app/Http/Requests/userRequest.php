<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
            'id'=>'required|max:1|Numeric',
            'login'=> 'required|max:50',
            'password'=> 'required|max:50',
            'email'=>'required|max:50',
            'last_name'=> 'max:50',
            'first_name'=>'max:50',
            'role_id'=> 'required|max:1|Numeric'
        ];
    }
}