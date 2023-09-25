<?php

namespace App\Http\Requests\Admin\Brand;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Bạn có thể xác định quyền truy cập ở đây, ví dụ: 'return auth()->user()->can('update-brand', $this->brand);'
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
            'name' => 'string|max:255', // Ví dụ: tên thương hiệu có thể cập nhật và không bắt buộc
            'is_featured' => 'boolean', // Ví dụ: cập nhật trường is_featured và không bắt buộc
            'status' => 'boolean', // Ví dụ: cập nhật trường status và không bắt buộc
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
