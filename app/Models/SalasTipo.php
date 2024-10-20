<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Class SalasTipo
 * @package App\Models
 * @version October 9, 2024, 5:06 pm -03
 *
 * @property \Illuminate\Database\Eloquent\Collection $salas
 * @property string $stip_descripcion
 */
class SalasTipo extends EloquentModel
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'salas_tipo';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    protected $primaryKey = 'stip_id';

    public $fillable = [
        'stip_descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'stip_id' => 'integer',
        'stip_descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'stip_descripcion' => 'required|string|max:255|unique:salas_tipo,stip_descripcion',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function salas()
    {
        return $this->hasMany(\App\Models\Sala::class, 'stip_id');
    }
}
