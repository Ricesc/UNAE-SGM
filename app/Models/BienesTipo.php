<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Class BienesTipo
 * @package App\Models
 * @version October 9, 2024, 5:25 pm -03
 *
 * @property \Illuminate\Database\Eloquent\Collection $bienesSubTipo
 * @property string $btip_descripcion
 * @property string $btip_detalle
 */
class BienesTipo extends EloquentModel
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'bienes_tipos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    protected $primaryKey = 'btip_id';

    public $fillable = [
        'btip_descripcion',
        'btip_detalle'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'btip_id' => 'integer',
        'btip_descripcion' => 'string',
        'btip_detalle' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'btip_descripcion' => 'required|string|max:255|unique:bienes_tipos,btip_descripcion',
        'btip_detalle' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bienesSubTipo()
    {
        return $this->hasMany(\App\Models\BienesSubTipo::class, 'btip_id');
    }
}
