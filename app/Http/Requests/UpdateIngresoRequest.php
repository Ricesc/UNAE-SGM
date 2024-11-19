<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Ingreso;

class UpdateIngresoRequest extends FormRequest
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
        return [
            // Detalles de la Compra
            'prov_id' => 'required_without:nuevo_prov_nombre',
            'nuevo_prov_nombre' => 'nullable|required_if:prov_id,null|string|max:255',
            'prov_telefono' => 'nullable|string|max:20',
            'prov_direccion' => 'nullable|string|max:255',
            'prov_localidad' => 'nullable|string|max:255',
            'ing_fecha_compra' => 'required|date',
            'idet_costo' => 'required|numeric|min:0',
            'idet_cantidad' => 'required|integer|min:1',

            // Detalles del Bien
            'btip_descripcion' => 'required|string|max:255',
            'bsti_descripcion' => 'required|string|max:255',

            // Ubicación del Bien
            'edif_id' => 'required|exists:edificios,edif_id',
            'piso_id' => 'required|exists:pisos,piso_id',
            'sect_id' => 'required|exists:sectores,sect_id',
            'sala_id' => 'required|exists:salas,sala_id',
        ];
    }

    /**
     * Mensajes personalizados para las reglas de validación.
     */
    public function messages()
    {
        return [
            'prov_id.required_without' => 'Seleccione un proveedor o complete los datos de un nuevo proveedor.',
            'nuevo_prov_nombre.required_if' => 'El nombre del nuevo proveedor es obligatorio si no selecciona uno existente.',
            'ing_fecha_compra.required' => 'La fecha de compra es obligatoria.',
            'idet_costo.required' => 'El costo unitario es obligatorio.',
            'idet_cantidad.required' => 'La cantidad es obligatoria.',
            'btip_descripcion.required' => 'Debe proporcionar un tipo de bien.',
            'bsti_descripcion.required' => 'Debe proporcionar un subtipo de bien.',
            'edif_id.required' => 'Seleccione un edificio.',
            'piso_id.required' => 'Seleccione un piso.',
            'sect_id.required' => 'Seleccione un sector.',
            'sala_id.required' => 'Seleccione una sala.',
        ];
    }
}
