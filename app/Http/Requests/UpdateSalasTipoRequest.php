<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\SalasTipo;

class UpdateSalasTipoRequest extends FormRequest
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
        $rules = SalasTipo::$rules;

        // Ignorar la validación única para el registro actual
        $rules['stip_descripcion'] = 'required|string|max:255|unique:salas_tipo,stip_descripcion,' . $this->route('salasTipo') . ',stip_id';

        return $rules;
    }

    public function messages()
    {
        return [
            'stip_descripcion.required' => 'Por favor, ingrese una descripción para el tipo de sala.',
            'stip_descripcion.unique' => 'Ya existe un tipo de sala con esta descripción.'
        ];
    }
}
