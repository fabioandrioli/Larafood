<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreUpdateUser extends FormRequest
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
        $id = $this->segment(3);
        $rules = [
            'name' => ['required', 'string','min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,{$id},id'],
            'password' => ['required', 'string', 'min:6'],
        ];

        if($this->method() == 'PUT'){
            $rules['password'] = ['nullable', 'string', 'min:6'];
        }

        return $rules;
    }
}
