<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
            'date' => 'required',
            'car_id' => 'required'
        ];
    }

    public function messages(){
        return [
            'date.required' => 'Preencha a data YYYY-MM-DD',
            'car_id.required' => 'Selecione o veiculo'
        ];
    }
}
