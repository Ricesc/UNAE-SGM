<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Class Proveedor
 * @package App\Models
 * @version October 9, 2024, 5:33 pm -03
 *
 * @property \Illuminate\Database\Eloquent\Collection $usuarios
 * @property string $prov_nombre
 * @property integer $prov_telefono
 * @property string $prov_ruc
 * @property string $prov_direccion
 * @property string $prov_localidad
 */
class Proveedor extends EloquentModel
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'proveedores';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    protected $primaryKey = 'prov_id';

    public $fillable = [
        'prov_nombre',
        'prov_telefono',
        'prov_ruc',
        'prov_direccion',
        'prov_localidad'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'prov_id' => 'integer',
        'prov_nombre' => 'string',
        'prov_telefono' => 'integer',
        'prov_ruc' => 'string',
        'prov_direccion' => 'string',
        'prov_localidad' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'prov_nombre' => 'required|string|max:255',
        'prov_telefono' => 'nullable|integer',
        'prov_ruc' => 'nullable|string|max:255|unique:proveedores,prov_ruc',
        'prov_direccion' => 'nullable|string',
        'prov_localidad' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function ingresos()
    {
        return $this->hasMany(\App\Models\Ingreso::class, 'prov_id');
    }
}
