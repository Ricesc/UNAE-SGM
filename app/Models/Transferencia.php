<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Class Transferencia
 * @package App\Models
 * @version October 7, 2024, 7:02 pm UTC
 *
 * @property \App\Models\Sala $sala
 * @property \App\Models\Usuario $usu
 * @property \Illuminate\Database\Eloquent\Collection $bienes
 * @property integer $sala_id
 * @property integer $usu_id
 * @property string $tran_fecha
 * @property integer $tran_procesado
 */
class Transferencia extends EloquentModel
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'transferencias';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    protected $primaryKey = 'tran_id';

    public $fillable = [
        'sala_id',
        'usu_id',
        'tran_fecha',
        'tran_procesado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tran_id' => 'integer',
        'sala_id' => 'integer',
        'usu_id' => 'integer',
        'tran_fecha' => 'date',
        'tran_procesado' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'sala_id' => 'nullable|integer',
        'usu_id' => 'nullable|integer',
        'tran_fecha' => 'nullable',
        'tran_procesado' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

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
    public function usu()
    {
        return $this->belongsTo(\App\Models\Usuario::class, 'usu_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function bienes()
    {
        return $this->belongsToMany(\App\Models\Bien::class, 'tranfer_detalles');
    }
}
