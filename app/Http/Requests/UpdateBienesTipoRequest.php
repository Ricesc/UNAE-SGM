<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\BienesTipo;

class UpdateBienesTipoRequest extends FormRequest
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
        $rules = BienesTipo::$rules;

        // Ignorar la validación única para el registro actual
        $rules['btip_descripcion'] = 'required|string|max:255|unique:bienes_tipos,btip_descripcion,' . $this->route('bienesTipo') . ',btip_id';

        return $rules;
    }

    public function messages()
    {
        return [
            'btip_descripcion.required' => 'Por favor, ingrese una descripción para el tipo de bien.',
            'btip_descripcion.unique' => 'Ya existe un tipo de bien con esta descripción.'
        ];
    }
}
