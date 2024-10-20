<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\SalasTipo;

class CreateSalasTipoRequest extends FormRequest
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
        return SalasTipo::$rules;
    }

    public function messages()
    {
        return [
            'stip_descripcion.required' => 'Por favor, ingrese una descripción para el tipo de sala.',
            'stip_descripcion.unique' => 'Ya existe un tipo de sala con esta descripción.'
        ];
    }
}
