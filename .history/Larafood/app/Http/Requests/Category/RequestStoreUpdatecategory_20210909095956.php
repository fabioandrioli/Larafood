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
        $url = $this->segment(3);
        return  [
            'name' => ['required', 'string', 'max:255','unique:categories,name,{$url},url'],
            'description' => ['required', 'string', 'min:6'],
        ];
    }
}
