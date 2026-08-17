<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255', 'unique:products,name'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'sale_price' => ['nullable', 'numeric', 'min:0', 'lt:price'],
            'stock' => ['required', 'integer', 'min:0'],
            'is_new_arrival' => ['nullable', 'boolean'],
            'images' => ['required', 'array', 'min:1'],
            'images.*' => ['image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'sale_price.lt' => __('The sale price must be lower than the standard base price.'),
            'images.required' => __('You must upload at least one product showcase image.'),
            'images.*.image' => __('Every uploaded file must be a valid image file type.'),
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_new_arrival' => $this->has('is_new_arrival'),
        ]);
    }
}
