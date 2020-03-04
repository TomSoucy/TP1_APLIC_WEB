<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class criticRequest extends FormRequest
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
            'user_id'=> 'required|Numeric',
            'film_id'=> 'required|Numeric',
            'score'=> 'max:3',
            'comment'=>'max:255'
            ];
    }
}
