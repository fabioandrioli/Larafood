<?php

namespace App\Http\Requests\Plan;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePlanRequest extends FormRequest
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
        /* segmento é pego da url 
        conta a partir da barra raiz, então o admin seria => 1
        e assim por diante.     /  1   /  2  /   3
        //http://127.0.0.1:8000/admin/plans/asdasdasd/edit */
        $url = $this->segment(3);
        return [
            'name' => "required|min:4|max:255|unique:plans,name,{$url},url",
            'description' => 'nullable|min:3|max:255',
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/"
        ];
    }
}
