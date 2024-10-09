<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Class Edificio
 * @package App\Models
 * @version October 9, 2024, 2:00 pm -03
 *
 * @property \Illuminate\Database\Eloquent\Collection $pisos
 * @property string $edif_descripcion
 * @property string $edif_direccion
 */
class Edificio extends EloquentModel
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'edificios';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    protected $primaryKey = 'edif_id';

    public $fillable = [
        'edif_descripcion',
        'edif_direccion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'edif_id' => 'integer',
        'edif_descripcion' => 'string',
        'edif_direccion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'edif_descripcion' => 'required|string|max:255',
        'edif_direccion' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pisos()
    {
        return $this->hasMany(\App\Models\Piso::class, 'edif_id');
    }
}
