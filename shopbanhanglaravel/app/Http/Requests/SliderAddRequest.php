<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:sliders|max:255',
            'description' => 'required',
            'image_path' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên không được phép để trống',
            'name.unique' => 'Tên không được phép để trùng',
            'name.max' => 'Tên không được phép quá 255 kí tự',
            'description.required' => 'Mô tả không được phép để trống',
            'image_path.required' => 'Hình ảnh không được phép để trống',
        ];
    }
}