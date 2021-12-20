<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RentRequest extends FormRequest
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
        return [
            'car_id' => 'required',
            'user_id' => 'required',
            'booked_in' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'car_id.required' => 'Você precisa selecionar o vaículo',
            'user_id.required' => 'Usuário não selecionado',
            'booked_in.required' => 'A data é obrigatória'
        ];
    }
}
