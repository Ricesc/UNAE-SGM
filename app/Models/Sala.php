<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Class Sala
 * @package App\Models
 * @version October 9, 2024, 5:01 pm -03
 *
 * @property \App\Models\Sectore $sect
 * @property \App\Models\SalasTipo $stip
 * @property \App\Models\Dependencia $depe
 * @property \Illuminate\Database\Eloquent\Collection $bienes
 * @property \Illuminate\Database\Eloquent\Collection $usuarios
 * @property integer $sect_id
 * @property integer $stip_id
 * @property integer $depe_id
 * @property string $sala_descripcion
 * @property string $sala_direccion
 * @property integer $sala_capacidad
 */
class Sala extends EloquentModel
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'salas';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    protected $primaryKey = 'sala_id';

    public $fillable = [
        'sect_id',
        'stip_id',
        'depe_id',
        'sala_descripcion',
        'sala_direccion',
        'sala_capacidad'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'sala_id' => 'integer',
        'sect_id' => 'integer',
        'stip_id' => 'integer',
        'depe_id' => 'integer',
        'sala_descripcion' => 'string',
        'sala_direccion' => 'string',
        'sala_capacidad' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'sect_id' => 'nullable|integer',
        'stip_id' => 'nullable|integer',
        'depe_id' => 'nullable|integer',
        'sala_descripcion' => 'required|string|max:255',
        'sala_direccion' => 'nullable|string|max:255',
        'sala_capacidad' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sect()
    {
        return $this->belongsTo(\App\Models\Sector::class, 'sect_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function stip()
    {
        return $this->belongsTo(\App\Models\SalasTipo::class, 'stip_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function depe()
    {
        return $this->belongsTo(\App\Models\Dependencia::class, 'depe_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bienes()
    {
        return $this->hasMany(\App\Models\Bien::class, 'sala_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function transferencias()
    {
        return $this->hasMany(\App\Models\Transferencia::class, 'sala_id');
    }
}
