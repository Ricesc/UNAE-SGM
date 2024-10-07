<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Class TranferDetalle
 * @package App\Models
 * @version October 7, 2024, 8:27 pm UTC
 *
 * @property \App\Models\Transferencia $tran
 * @property \App\Models\Biene $bien
 * @property integer $tran_id
 * @property integer $bien_id
 * @property integer $trdet_estado
 */
class TranferDetalle extends EloquentModel
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'tranfer_detalles';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    protected $primaryKey = 'trdet_id';

    public $fillable = [
        'tran_id',
        'bien_id',
        'trdet_estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'trdet_id' => 'integer',
        'tran_id' => 'integer',
        'bien_id' => 'integer',
        'trdet_estado' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tran_id' => 'nullable|integer',
        'bien_id' => 'nullable|integer',
        'trdet_estado' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tran()
    {
        return $this->belongsTo(\App\Models\Transferencia::class, 'tran_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function bien()
    {
        return $this->belongsTo(\App\Models\Bien::class, 'bien_id');
    }
}
