<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\BienesTipo;

class CreateBienesTipoRequest extends FormRequest
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
        return BienesTipo::$rules;
    }

    public function messages()
    {
        return [
            'btip_descripcion.required' => 'Por favor, ingrese una descripción para el tipo de bien.',
            'bsti_id.required' => 'Seleccione el sub tipo de bien asociado a este tipo de bien.',
        ];
    }
}
