<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Proveedor;

class CreateProveedorRequest extends FormRequest
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
        return Proveedor::$rules;
    }

    public function messages()
    {
        return [
            'prov_nombre.required' => 'El nombre del proveedor es obligatorio.',
            'prov_ruc.unique' => 'El RUC ya está registrado',
        ];
    }
}
