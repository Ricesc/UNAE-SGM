<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Edificio;

class UpdateEdificioRequest extends FormRequest
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
        $rules = Edificio::$rules;

        // Ignorar la validación única para el registro actual
        $rules['edif_descripcion'] = 'required|string|max:255|unique:edificios,edif_descripcion,' . $this->route('edificio') . ',edif_id';

        return $rules;
    }

    public function messages()
    {
        return [
            'edif_descripcion.required' => 'Por favor, ingrese una descripción para el edificio.',
            'edif_descripcion.unique' => 'Ya existe un edificio con esta descripción.'
        ];
    }
}
