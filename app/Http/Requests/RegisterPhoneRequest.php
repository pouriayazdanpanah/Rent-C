<?php

namespace App\Http\Requests;

use App\Rules\Recaptche;
use Illuminate\Foundation\Http\FormRequest;

class RegisterPhoneRequest extends FormRequest
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
            'p-name' => ['required', 'string', 'min:3','max:255'],
            'p-last-name' => ['required', 'string', 'min:3','max:255'],
            'phone' => ['required', 'regex:/^09(1[0-9]|3[1-9]|2[1-9])-?[0-9]{3}-?[0-9]{4}$/', 'unique:users,phone'],
            'g-recaptcha-response' => ['required', new Recaptche]
        ];
    }
}
