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
            'plate' => 'required',
            'color' => 'required',
            'brand' => 'required',
            'type' => ['required',
                Rule::in(['Particular', 'Publico']),
            ],
            'driver_id' => 'required',
            'owner_id' => 'required',
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'plate.required' => 'La placa del vehículo es obligatoria',
            'color.required' => 'El color del vehículo es obligatorio',
            'brand.required' => 'La marca del vehículo es obligatoria',
            'type.required' => 'El tipo es obligatorio',
            'type.in' => 'El tipo debe ser Particular o Publico',
            'driver_id.required' => 'El conductor es obligatorio',
            'owner_id.required' => 'El propietario es obligatorio',
        ];

    }
}
