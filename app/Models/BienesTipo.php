<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Class BienesTipo
 * @package App\Models
 * @version October 9, 2024, 5:28 pm -03
 *
 * @property \App\Models\BienesSubTipo $bsti
 * @property \Illuminate\Database\Eloquent\Collection $ingresos
 * @property \Illuminate\Database\Eloquent\Collection $bienes
 * @property integer $bsti_id
 * @property string $btip_descripcion
 * @property string $btip_detalle
 * @property integer $btip_costo
 */
class BienesTipo extends EloquentModel
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'bienes_tipos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    protected $primaryKey = 'btip_id';

    public $fillable = [
        'bsti_id',
        'btip_descripcion',
        'btip_detalle',
        'btip_costo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'btip_id' => 'integer',
        'bsti_id' => 'integer',
        'btip_descripcion' => 'string',
        'btip_detalle' => 'string',
        'btip_costo' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'bsti_id' => 'nullable|integer',
        'btip_descripcion' => 'required|string|max:255',
        'btip_detalle' => 'nullable|string',
        'btip_costo' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function bsti()
    {
        return $this->belongsTo(\App\Models\BienesSubTipo::class, 'bsti_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function ingresos()
    {
        return $this->belongsToMany(\App\Models\Ingreso::class, 'ingresos_det');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bienes()
    {
        return $this->hasMany(\App\Models\Bien::class, 'btip_id');
    }
}
