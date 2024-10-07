<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Class BajasDet
 * @package App\Models
 * @version October 7, 2024, 8:04 pm UTC
 *
 * @property \App\Models\Baja $baja
 * @property \App\Models\Biene $bien
 * @property integer $baja_id
 * @property integer $bien_id
 * @property integer $bdet_estado
 */
class BajasDet extends EloquentModel
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'bajas_det';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    protected $primaryKey = 'bdet_id';

    public $fillable = [
        'baja_id',
        'bien_id',
        'bdet_estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'bdet_id' => 'integer',
        'baja_id' => 'integer',
        'bien_id' => 'integer',
        'bdet_estado' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'baja_id' => 'nullable|integer',
        'bien_id' => 'nullable|integer',
        'bdet_estado' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function baja()
    {
        return $this->belongsTo(\App\Models\Baja::class, 'baja_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function bien()
    {
        return $this->belongsTo(\App\Models\Bien::class, 'bien_id');
    }
}
