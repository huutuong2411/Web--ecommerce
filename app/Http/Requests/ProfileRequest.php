<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name'=>'required|max:50',
            'example-email'=>'email',
            'avatar*'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone'=>'required',
        ];
    }

    public function messages() {
        return [
            'required'=>':attribute không được để trống',
            'max'=>':attribute không được quá :max ký tự',
            'image'=>':attribute phải là hình ảnh',
            'email'=>':attribute phải có dạng xx@yy',
            'mimes'=>':attribute phải có định dạng jpeg,png,jpg,gif,svg',
        ];
    }
    public function attributes(){
        return[
            'name'=>'Tên đầy đủ',
            'example-email'=>'email',
            ];
    }
}
