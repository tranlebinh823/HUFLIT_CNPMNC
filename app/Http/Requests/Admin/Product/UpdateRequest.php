<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|max:255',
            'description' => 'nullable|string',
            'price' => 'numeric',
            'stock' => 'integer',
            'category_id' => 'exists:categories,id',
            // Thêm các quy tắc kiểm tra cho các trường khác tại đây
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => 'Trường :attribute phải là một chuỗi.',
            'name.max' => 'Trường :attribute không được dài hơn :max ký tự.',
            'description.string' => 'Trường :attribute phải là một chuỗi.',
            'price.numeric' => 'Trường :attribute phải là một số.',
            'stock.integer' => 'Trường :attribute phải là một số nguyên.',
            'category_id.exists' => 'Trường :attribute không hợp lệ.',
            // Thêm các thông báo lỗi cho các trường khác tại đây
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Tên sản phẩm',
            'description' => 'Mô tả',
            'price' => 'Giá',
            'stock' => 'Số lượng tồn kho',
            'category_id' => 'Danh mục',
            // Thêm các tên trường cho các trường khác tại đây
        ];
    }
}
