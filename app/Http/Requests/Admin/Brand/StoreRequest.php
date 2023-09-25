<?php

namespace App\Http\Requests\Admin\Brand;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Bạn có thể xác định quyền truy cập ở đây, ví dụ: 'return auth()->user()->can('create-brand');'
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
           'name' => 'required|string|max:255', // Ví dụ: yêu cầu tên thương hiệu là một chuỗi với độ dài tối đa 255 ký tự
            'slug' => 'required|string|unique:brands,slug', // Ví dụ: yêu cầu slug là một chuỗi và duy nhất trong bảng "brands"
            'is_featured' => 'required|boolean', // Ví dụ: yêu cầu trường is_featured phải là boolean (true hoặc false)
            'status' => 'required|boolean', // Ví dụ: yêu cầu trường status phải là boolean (true hoặc false)
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
            'logo.required' => 'Trường :attribute là bắt buộc.',
            'logo.image' => 'Trường :attribute phải là một hình ảnh.',
            'logo.mimes' => 'Trường :attribute phải có định dạng jpeg, png, jpg hoặc gif.',
            'logo.max' => 'Trường :attribute không được vượt quá :max KB.',
            'name.required' => 'Trường :attribute là bắt buộc.',
            'name.string' => 'Trường :attribute phải là một chuỗi.',
            'name.max' => 'Trường :attribute không được dài hơn :max ký tự.',
            'slug.required' => 'Trường :attribute là bắt buộc.',
            'slug.string' => 'Trường :attribute phải là một chuỗi.',
            'slug.unique' => 'Trường :attribute đã tồn tại trong hệ thống.',
            'is_featured.required' => 'Trường :attribute là bắt buộc.',
            'is_featured.boolean' => 'Trường :attribute phải là true hoặc false.',
            'status.required' => 'Trường :attribute là bắt buộc.',
            'status.boolean' => 'Trường :attribute phải là true hoặc false.',
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
            'logo' => 'Logo',
            'name' => 'Tên thương hiệu',
            'slug' => 'Slug',
            'is_featured' => 'Nổi bật',
            'status' => 'Trạng thái',
        ];
    }
}
