<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
        $license_plate = $this->method() == 'POST' ? ['license_plate' => 'required|size:7|unique:cars'] : [ 'license_plate' => 'required']; 
        $fields = [
            'brand' => 'required|min:4',
            'model' => 'required|min:2',
            'year_of_manufacture' => 'required|size:4'
        ];
        
        return array_merge($fields, $license_plate);
    }

    public function messages()
    {
        return [
            'brand.required' => 'A marca do veículo é obrigatória',
            'brand.min' => 'A marca do veículo é muito curta',
            'model.min' => 'O modelo do veículo é muito curto',
            'model.required' => 'O modelo do veículo é obrigatório',
            'year_of_manufacture.required' => 'O ano de fabricação do veículo é obrigatório',
            'year_of_manufacture.size' => 'O ano de fabricação do veículo deve conter 4 numeros',
            'year_of_manufacture.integer' => 'O ano de fabricação do veículo deve conter 4 numeros',
            'license_plate.required' => 'A placa do veículo é obrigatória',
            'license_plate.size' => 'A placa digitada não correspode ao padrão nacional',
            'license_plate.unique' => 'A placa do veículo já está cadastrada',
        ];
    }
}
