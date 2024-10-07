<?php

namespace App\Repositories;

use App\Models\Ingreso;
use App\Repositories\BaseRepository;

/**
 * Class IngresoRepository
 * @package App\Repositories
 * @version October 7, 2024, 7:15 pm UTC
*/

class IngresoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'prov_id',
        'usu_id',
        'ing_fecha_compra',
        'ing_costo_total',
        'ing_estado'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Ingreso::class;
    }
}
