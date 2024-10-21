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

        // Ignorar la validación única para el registro actual
        $rules['bsti_descripcion'] = 'required|string|max:255|unique:bienes_sub_tipo,bsti_descripcion,' . $this->route('bienesSubTipo') . ',bsti_id';

        return $rules;
    }

    public function messages()
    {
        return [
            'bsti_descripcion.required' => 'Por favor, ingrese una descripción para el sub tipo de bien.',
            'bsti_descripcion.unique' => 'Ya existe un sub tipo de bien con esta descripción.'
        ];
    }
}
