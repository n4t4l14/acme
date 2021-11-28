<?php

namespace App\Http\V1\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'identification_number' => 'required',
            'first_name' => 'required',
            'surnames' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'city' => 'required',
            'role' => 'required',
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'identification_number.required' => 'El numero de identificacion es es obligatorio',
            'first_name.required' => 'El primer nombre es obligatorio',
            'surnames.required' => 'Los apellidos son obligatorios',
            'address.required' => 'La dirección es obligatoria',
            'phone_number.required' => 'El número de telefono es obligatorio',
            'city.required' => 'La ciudad es obligatoria',
            'role.required' => 'El rol es obligatorio',
        ];

    }
}
