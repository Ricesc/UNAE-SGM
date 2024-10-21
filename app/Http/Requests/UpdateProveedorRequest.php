<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Proveedor;

class UpdateProveedorRequest extends FormRequest
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
        $rules = Proveedor::$rules;

        // Ignorar la validación única para el registro actual
        $rules['prov_ruc'] = 'max:255|unique:proveedores,prov_ruc,' . $this->route('proveedore') . ',prov_id';

        return $rules;
    }

    public function messages()
    {
        return [
            'prov_nombre.required' => 'El nombre del proveedor es obligatorio.',
            'prov_ruc.unique' => 'El RUC ya está registrado',
        ];
    }
}
