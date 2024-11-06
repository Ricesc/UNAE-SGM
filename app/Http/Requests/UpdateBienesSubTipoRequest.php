<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\BienesSubTipo;

class UpdateBienesSubTipoRequest extends FormRequest
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
        $rules = BienesSubTipo::$rules;

        return $rules;
    }

    public function messages()
    {
        return [
            'bsti_descripcion.required' => 'Por favor, ingrese una descripción para el sub tipo de bien.',
            'btip_id.required' => 'Seleccione el tipo de bien asociado a este sub tipo de bien.',
        ];
    }
}
