<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Class Ingreso
 * @package App\Models
 * @version October 9, 2024, 5:31 pm -03
 *
 * @property \App\Models\Proveedore $prov
 * @property \App\Models\User $usu
 * @property \Illuminate\Database\Eloquent\Collection $bienesTipos
 * @property integer $prov_id
 * @property integer $usu_id
 * @property string $ing_fecha_compra
 * @property integer $ing_costo_total
 * @property integer $ing_estado
 */
class Ingreso extends EloquentModel
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'ingresos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    protected $primaryKey = 'ing_id';

    public $fillable = [
        'prov_id',
        'usu_id',
        'ing_fecha_compra',
        'ing_costo_total',
        'ing_estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ing_id' => 'integer',
        'prov_id' => 'integer',
        'usu_id' => 'integer',
        'ing_fecha_compra' => 'date',
        'ing_costo_total' => 'integer',
        'ing_estado' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'prov_id' => 'nullable|integer',
        'usu_id' => 'nullable|integer',
        'ing_fecha_compra' => 'nullable',
        'ing_costo_total' => 'nullable|integer',
        'ing_estado' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function prov()
    {
        return $this->belongsTo(\App\Models\Proveedor::class, 'prov_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function usu()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     **/
    public function IngresosDet()
    {
        return $this->hasMany(\App\Models\IngresosDet::class, 'ing_id');
    }
}
