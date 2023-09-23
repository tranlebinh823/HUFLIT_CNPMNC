<?php

namespace App\Http\Requests\Admin\SubCategory;

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
            'subcategory_name' => [
                'required',
                'string',
                'max:30',
                'min:6',
                'regex:/^[a-zA-Z\s]+$/',
                'not_regex:/@gmail\.com$/i',
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
            'subcategory_name.regex' => 'Trường :attribute chỉ được chứa chữ cái và dấu cách.',
            'subcategory_name.not_regex' => 'Trường :attribute không được phép chứa địa chỉ email Gmail.',
            'category_id.required' => 'Trường :attribute là bắt buộc.',
            'category_id.exists' => 'Trường :attribute không hợp lệ.',
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
