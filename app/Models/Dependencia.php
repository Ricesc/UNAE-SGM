<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Class Dependencia
 * @package App\Models
 * @version October 9, 2024, 5:13 pm -03
 *
 * @property \Illuminate\Database\Eloquent\Collection $salas
 * @property string $depe_descripcion
 * @property integer $depe_telefono
 */
class Dependencia extends EloquentModel
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'dependencias';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    protected $primaryKey = 'depe_id';

    public $fillable = [
        'depe_descripcion',
        'depe_telefono'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'depe_id' => 'integer',
        'depe_descripcion' => 'string',
        'depe_telefono' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'depe_descripcion' => 'required|string|max:255|unique:dependencias,depe_descripcion',
        'depe_telefono' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function salas()
    {
        return $this->hasMany(\App\Models\Sala::class, 'depe_id');
    }
}
