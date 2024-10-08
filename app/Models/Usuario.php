<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Class Usuario
 * @package App\Models
 * @version October 8, 2024, 12:55 am -03
 *
 * @property \Illuminate\Database\Eloquent\Collection $bajas
 * @property \Illuminate\Database\Eloquent\Collection $proveedores
 * @property \Illuminate\Database\Eloquent\Collection $salas
 * @property string $usu_nombre
 * @property string $usu_apellido
 * @property integer $usu_rol
 */
class Usuario extends EloquentModel
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'usuarios';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    protected $primaryKey = 'usu_id';

    public $fillable = [
        'usu_nombre',
        'usu_apellido',
        'usu_rol'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'usu_id' => 'integer',
        'usu_nombre' => 'string',
        'usu_apellido' => 'string',
        'usu_rol' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'usu_nombre' => 'required|string|max:255',
        'usu_apellido' => 'required|string|max:255',
        'usu_rol' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bajas()
    {
        return $this->hasMany(\App\Models\Baja::class, 'usu_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function proveedores()
    {
        return $this->belongsToMany(\App\Models\Proveedor::class, 'ingresos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function salas()
    {
        return $this->belongsToMany(\App\Models\Sala::class, 'transferencias');
    }
}
