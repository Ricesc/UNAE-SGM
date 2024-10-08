<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Class Baja
 * @package App\Models
 * @version October 7, 2024, 7:08 pm UTC
 *
 * @property \App\Models\Usuario $usu
 * @property \Illuminate\Database\Eloquent\Collection $bienes
 * @property integer $usu_id
 * @property string $baja_fecha
 * @property integer $baja_estado
 */
class Baja extends EloquentModel
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'bajas';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    protected $primaryKey = 'baja_id';

    public $fillable = [
        'usu_id',
        'baja_fecha',
        'baja_estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'baja_id' => 'integer',
        'usu_id' => 'integer',
        'baja_fecha' => 'date',
        'baja_estado' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'usu_id' => 'nullable|integer',
        'baja_fecha' => 'nullable',
        'baja_estado' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

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
        return $this->belongsToMany(\App\Models\Bien::class, 'bajas_det');
    }
}