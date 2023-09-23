<?php
namespace App\Http\Requests\Admin\Category;

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
            'category_name' => [
                'required',
                'string',
                'max:30',
                'min:6',
                'regex:/^[a-zA-Z\s]+$/',
                'not_regex:/@gmail\.com$/i',
            ],
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
            'category_name.required' => 'Trường :attribute là bắt buộc.',
            'category_name.string' => 'Trường :attribute phải là một chuỗi.',
            'category_name.max' => 'Trường :attribute không được dài hơn :max ký tự.',
            'category_name.min' => 'Trường :attribute phải có ít nhất :min ký tự.',
            'category_name.regex' => 'Trường :attribute chỉ được chứa chữ cái và dấu cách.',
            'category_name.not_regex' => 'Trường :attribute không được phép chứa địa chỉ email Gmail.',
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
            'category' => 'Category',
        ];
    }
}
