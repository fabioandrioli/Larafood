<?php

namespace App\Http\Requests\Table;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreUpdateTable extends FormRequest
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
        $id = $this->segment(3);
        return [
            "identify" => "required|min:3|max:255|unique:profiles,name,{$id},id",
            "description" => "min:5|max:255",
        ];
    }
}