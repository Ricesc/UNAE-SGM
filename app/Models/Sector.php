<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Class Sector
 * @package App\Models
 * @version October 9, 2024, 4:55 pm -03
 *
 * @property \App\Models\Piso $piso
 * @property \Illuminate\Database\Eloquent\Collection $salas
 * @property integer $piso_id
 * @property string $sect_descripcion
 * @property string $sect_direccion
 */
class Sector extends EloquentModel
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'sectores';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    protected $primaryKey = 'sect_id';

    public $fillable = [
        'piso_id',
        'sect_descripcion',
        'sect_direccion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'sect_id' => 'integer',
        'piso_id' => 'integer',
        'sect_descripcion' => 'string',
        'sect_direccion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'piso_id' => 'nullable|integer',
        'sect_descripcion' => 'required|string|max:255',
        'sect_direccion' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function piso()
    {
        return $this->belongsTo(\App\Models\Piso::class, 'piso_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function salas()
    {
        return $this->hasMany(\App\Models\Sala::class, 'sect_id');
    }
}
