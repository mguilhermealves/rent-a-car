<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $cpf = $this->method() == 'POST' ? ['cpf' => 'required|unique:users'] : [ 'cpf' => 'required']; 
        $email = $this->method() == 'POST' ? ['email' => 'required|email:dns,rfc|unique:users'] : [ 'email' => 'required']; 
        $fields = [
            'name' => 'required',
        ];


        return array_merge($fields, $email, $cpf);
        
    }


    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'cpf.required' => 'O CPF é obrigatório',
            'cpf.unique' => 'O CPF já está cadastrado',
            'email.required' => 'O email é obrigatório',
            'email.unique' => 'O email já está cadastrado',
        ];
    }
}
