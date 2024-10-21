<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Sector;

class UpdateSectorRequest extends FormRequest
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
        $rules = Sector::$rules;

        return $rules;
    }

    public function messages()
    {
        return [
            'sect_descripcion.required' => 'Por favor, ingrese una descripción para el sector.',
            'piso_id.required' => 'Seleccione el piso asociado a este sector.',
        ];
    }
}
