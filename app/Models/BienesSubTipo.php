<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Class BienesSubTipo
 * @package App\Models
 * @version October 9, 2024, 5:28 pm -03
 *
 * @property \App\Models\BienesSubTipo $bsti
 * @property \Illuminate\Database\Eloquent\Collection $ingresos
 * @property \Illuminate\Database\Eloquent\Collection $bienes
 * @property integer $btip_id
 * @property string $bsti_descripcion
 * @property string $bsti_detalle
 * @property integer $bsti_costo
 */
class BienesSubTipo extends EloquentModel
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'bienes_sub_tipo';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    protected $primaryKey = 'bsti_id';

    public $fillable = [
        'btip_id',
        'bsti_descripcion',
        'bsti_detalle',
        'bsti_costo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'bsti_id' => 'integer',
        'btip_id' => 'integer',
        'bsti_descripcion' => 'string',
        'bsti_detalle' => 'string',
        'bsti_costo' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'btip_id' => 'required|integer',
        'bsti_descripcion' => 'required|string|max:255',
        'bsti_detalle' => 'nullable|string',
        'bsti_costo' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function btip()
    {
        return $this->belongsTo(\App\Models\BienesTipo::class, 'btip_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     **/
    public function IngresosDet()
    {
        return $this->hasMany(\App\Models\IngresosDet::class, 'bsti_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bienes()
    {
        return $this->hasMany(\App\Models\Bien::class, 'bsti_id');
    }
}
