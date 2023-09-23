<?php

namespace App\Http\Requests\Admin\ChildCategory;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'childcategory_name' => 'required|string|min:6|max:30|regex:/^[a-zA-Z\s]+$/',
            'subcategory_id' => 'required|exists:sub_categories,id',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'childcategory_name.required' => 'Tên Child Category là bắt buộc.',
            'childcategory_name.string' => 'Tên Child Category phải là một chuỗi.',
            'childcategory_name.min' => 'Tên Child Category phải có ít nhất 6 ký tự.',
            'childcategory_name.max' => 'Tên Child Category không được vượt quá 30 ký tự.',
            'childcategory_name.regex' => 'Tên Child Category chỉ được chứa chữ cái và khoảng trắng.',
            'subcategory_id.required' => 'Subcategory ID là bắt buộc.',
            'subcategory_id.exists' => 'Subcategory ID không tồn tại trong cơ sở dữ liệu.',
        ];
    }
}
