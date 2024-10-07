<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Class BienesSubTipo
 * @package App\Models
 * @version October 7, 2024, 7:46 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $bienesTipos
 * @property string $bsti_descripcion
 * @property string $bsti_detalle
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
        'bsti_descripcion',
        'bsti_detalle'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'bsti_id' => 'integer',
        'bsti_descripcion' => 'string',
        'bsti_detalle' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'bsti_descripcion' => 'required|string|max:255',
        'bsti_detalle' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bienesTipos()
    {
        return $this->hasMany(\App\Models\BienesTipo::class, 'bsti_id');
    }
}
