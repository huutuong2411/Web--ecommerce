<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'price' => 'required|min:0',
            'category' => 'required',
            'brand' => 'required',
            'sale'=>'min:0',
            'company' => 'required',
            'image*'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

     public function messages() {
        return [
            'required'=>':attribute không được để trống',
            'min'=>':attribute không được dưới :min',
            'image'=>':attribute phải là hình ảnh',
            'mimes'=>':attribute phải có định dạng jpeg,png,jpg,gif,svg',
            'max'=>':attribute phải dưới 1Mb'
        ];
    }
    public function attributes(){
        return[
            'name'=>'Tên sản phẩm',
            'price'=>'Giá',
            ];
    }
}
