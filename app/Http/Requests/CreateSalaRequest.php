<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Sala;

class CreateSalaRequest extends FormRequest
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
        return Sala::$rules;
    }

    public function messages()
    {
        return [
            'sala_descripcion.required' => 'Por favor, ingrese una descripción para la sala.',
            'depe_id.required' => 'Seleccione la dependencia asociada a esta sala.',
            'stip_id.required' => 'Seleccione el tipo de sala asociada a esta sala.',
            'sect_id.required' => 'Seleccione el sector asociado a esta sala.',
        ];
    }
}
