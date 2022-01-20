<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequsest extends FormRequest
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
//            'bedroom' => ['required' , 'string'],
//            'bathroom' =>['required', 'string'],
            'price' =>['required' , 'string'],
            'categories' =>['required'],
            'features' => ['required','array'],
            'lng' => ['required'],
            'lat' => ['required']
        ];
    }
}
