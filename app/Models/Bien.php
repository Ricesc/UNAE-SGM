<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Class Bien
 * @package App\Models
 * @version October 9, 2024, 5:22 pm -03
 *
 * @property \App\Models\BienesTipo $btip
 * @property \App\Models\Sala $sala
 * @property \App\Models\IngresosDet $idet
 * @property \Illuminate\Database\Eloquent\Collection $bajas
 * @property \Illuminate\Database\Eloquent\Collection $transferencias
 * @property integer $btip_id
 * @property integer $sala_id
 * @property integer $idet_id
 * @property integer $bien_estado
 * @property string $bien_codigo
 */
class Bien extends EloquentModel
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'bienes';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    protected $primaryKey = 'bien_id';

    public $fillable = [
        'btip_id',
        'sala_id',
        'idet_id',
        'bien_estado',
        'bien_codigo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'bien_id' => 'integer',
        'btip_id' => 'integer',
        'sala_id' => 'integer',
        'idet_id' => 'integer',
        'bien_estado' => 'integer',
        'bien_codigo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'btip_id' => 'nullable|integer',
        'sala_id' => 'nullable|integer',
        'idet_id' => 'nullable|integer',
        'bien_estado' => 'nullable|integer',
        'bien_codigo' => 'nullable|string|max:30',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sala()
    {
        return $this->belongsTo(\App\Models\Sala::class, 'sala_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idet()
    {
        return $this->belongsTo(\App\Models\IngresosDet::class, 'idet_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function bajas()
    {
        return $this->belongsToMany(\App\Models\Baja::class, 'bajas_det');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function transferencias()
    {
        return $this->belongsToMany(\App\Models\Transferencia::class, 'tranfer_detalles');
    }
}
