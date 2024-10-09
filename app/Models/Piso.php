<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Class Piso
 * @package App\Models
 * @version October 9, 2024, 2:13 pm -03
 *
 * @property \App\Models\Edificio $edif
 * @property \Illuminate\Database\Eloquent\Collection $sectores
 * @property integer $edif_id
 * @property string $piso_descripcion
 * @property string $piso_direccion
 */
class Piso extends EloquentModel
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'pisos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    protected $primaryKey = 'piso_id';

    public $fillable = [
        'edif_id',
        'piso_descripcion',
        'piso_direccion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'piso_id' => 'integer',
        'edif_id' => 'integer',
        'piso_descripcion' => 'string',
        'piso_direccion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'edif_id' => 'nullable|integer',
        'piso_descripcion' => 'required|string|max:255',
        'piso_direccion' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function edif()
    {
        return $this->belongsTo(\App\Models\Edificio::class, 'edif_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function sectores()
    {
        return $this->hasMany(\App\Models\Sector::class, 'piso_id');
    }
}
