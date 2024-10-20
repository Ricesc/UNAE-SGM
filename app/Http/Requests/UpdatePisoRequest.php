<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Piso;

class UpdatePisoRequest extends FormRequest
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
        $rules = Piso::$rules;

        return $rules;
    }

    public function messages()
    {
        return [
            'piso_descripcion.required' => 'Por favor, ingrese una descripción para el piso.',
            'edif_id.required' => 'Seleccione el edificio asociado a este piso.',
        ];
    }
}
