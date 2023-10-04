<?php

namespace App\Http\Requests\Admin\SubCategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'subcategory_name' => [
                'required',
                'string',
                'max:30',
                'min:6',
                'unique:sub_categories,subcategory_name',

            ],
            'category_id' => 'required|exists:categories,id',
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
            'subcategory_name.required' => 'Trường :attribute là bắt buộc.',
            'subcategory_name.string' => 'Trường :attribute phải là một chuỗi.',
            'subcategory_name.max' => 'Trường :attribute không được dài hơn :max ký tự.',
            'subcategory_name.min' => 'Trường :attribute phải có ít nhất :min ký tự.',
            'category_id.required' => 'Trường :attribute là bắt buộc.',
            'category_id.exists' => 'Trường :attribute không hợp lệ.',
            'subcategory_name.unique' => 'Trường :attribute đã tồn tại trong cơ sở dữ liệu.', // Thêm thông báo duy nhất

        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'subcategory_name' => 'Subcategory Name',
            'category_id' => 'Category ID',
        ];
    }
}
