<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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

    public function rules()
    {
        return [
            'password' => 'required|max:255',
            'confirm_password'=> 'required|same:password|max:255'
        ];
    }

    public function messages() {
        return [
           'confirm_password.same' => 'Password Confirmation should match the Password',
        ];
    }
}
