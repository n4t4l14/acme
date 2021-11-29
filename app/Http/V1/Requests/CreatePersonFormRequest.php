<?php

namespace App\Http\V1\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class CreatePersonFormRequest
 * @package App\Http\V1\Requests
 */
class CreatePersonFormRequest extends FormRequest
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
        //dd($this->request->all());
        return [
            'data.attributes.identification_number' => 'required',
            'data.attributes.first_name' => 'required',
            'data.attributes.surnames' => 'required',
            'data.attributes.address' => 'required',
            'data.attributes.phone_number' => 'required',
            'data.attributes.city' => 'required',
            'data.attributes.role' => [
                'required',
                Rule::in(['Conductor', 'Propietario']),
            ]
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'data.attributes.identification_number.required' => 'El numero de identificacion es es obligatorio',
            'data.attributes.first_name.required' => 'El primer nombre es obligatorio',
            'data.attributes.surnames.required' => 'Los apellidos son obligatorios',
            'data.attributes.address.required' => 'La dirección es obligatoria',
            'data.attributes.phone_number.required' => 'El número de telefono es obligatorio',
            'data.attributes.city.required' => 'La ciudad es obligatoria',
            'data.attributes.role.required' => 'El rol es obligatorio',
            'data.attributes.role.in' => 'El rol debe ser Conductor o Propietario'
        ];

    }
}
