<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreUpdatecategory extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return  [
            'name' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:255', 'unique:categories,url,{$url},url'],
            'description' => ['required', 'string', 'min:6'],
        ];
    }
}