<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Class IngresosDet
 * @package App\Models
 * @version October 7, 2024, 8:00 pm UTC
 *
 * @property \App\Models\Ingreso $ing
 * @property \App\Models\BienesSubTipo $bsti
 * @property \Illuminate\Database\Eloquent\Collection $bienes
 * @property integer $ing_id
 * @property integer $bsti_id
 * @property integer $idet_cantidad
 * @property integer $idet_estado
 */
class IngresosDet extends EloquentModel
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'ingresos_det';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    protected $primaryKey = 'idet_id';

    public $fillable = [
        'ing_id',
        'bsti_id',
        'idet_cantidad',
        'idet_estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idet_id' => 'integer',
        'ing_id' => 'integer',
        'bsti_id' => 'integer',
        'idet_cantidad' => 'integer',
        'idet_estado' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ing_id' => 'nullable|integer',
        'bsti_id' => 'nullable|integer',
        'idet_cantidad' => 'nullable|integer',
        'idet_estado' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function ing()
    {
        return $this->belongsTo(\App\Models\Ingreso::class, 'ing_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function bsti()
    {
        return $this->belongsTo(\App\Models\BienesTipoCambiarASubTipo::class, 'bsti_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bienes()
    {
        return $this->hasMany(\App\Models\Bien::class, 'idet_id');
    }
}
