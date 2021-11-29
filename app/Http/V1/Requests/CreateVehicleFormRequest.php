<?php

namespace App\Http\V1\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class CreateVehicleFormRequest
 * @package App\Http\V1\Requests
 */
class CreateVehicleFormRequest extends FormRequest
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
            'data.attributes.plate' => 'required',
            'data.attributes.color' => 'required',
            'data.attributes.brand' => 'required',
            'data.attributes.type' => [
                'required',
                Rule::in(['Particular', 'Publico']),
            ],
            'data.attributes.driver_id' => 'required',
            'data.attributes.owner_id' => 'required',
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'data.attributes.plate.required' => 'La placa del vehículo es obligatoria',
            'data.attributes.color.required' => 'El color del vehículo es obligatorio',
            'data.attributes.brand.required' => 'La marca del vehículo es obligatoria',
            'data.attributes.type.required' => 'El tipo es obligatorio',
            'data.attributes.type.in' => 'El tipo debe ser Particular o Publico',
            'data.attributes.driver_id.required' => 'El conductor es obligatorio',
            'data.attributes.owner_id.required' => 'El propietario es obligatorio',
        ];

    }
}
