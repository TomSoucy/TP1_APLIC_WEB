<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class filmRequest extends FormRequest
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
            'title'=>'required|max:255',
            'description'=> 'nullable|max:255',
            'release_year'=> 'required|max:4|Numeric',
            'language_id'=> 'required|max:1|Numeric',
            'length'=>'nullable|max:3|Numeric',
            'rating'=> 'max:5',
            'special_features'=>'nullable|max:255',
            'image'=>'nullable|Image'
        ];
    }
}
