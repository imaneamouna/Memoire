<?php

namespace App\Http\Requests\Dashboard\product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->user()->type == 'admin';
    }
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'main_price' => 'nullable|numeric',
            'category_id' => 'required|numeric|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'main_discount' => 'nullable|numeric',
            'colors' => 'nullable|array',
            'colors.*' => 'nullable|string',
            'sizes' => 'nullable|array',
            'sizes.*' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'quantity' => 'nullable|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];
    }
}
