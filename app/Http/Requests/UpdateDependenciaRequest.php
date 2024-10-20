<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Dependencia;

class UpdateDependenciaRequest extends FormRequest
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
        $rules = Dependencia::$rules;

        return $rules;
    }

    public function messages()
    {
        return [
            'depe_descripcion.required' => 'Por favor, ingrese una descripción para la dependencia.',
            'depe_descripcion.unique' => 'Ya existe una dependencia con esta descripción.'
        ];
    }
}
