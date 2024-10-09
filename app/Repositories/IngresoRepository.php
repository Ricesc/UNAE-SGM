<?php

namespace App\Repositories;

use App\Models\Ingreso;
use App\Repositories\BaseRepository;

/**
 * Class IngresoRepository
 * @package App\Repositories
 * @version October 9, 2024, 5:31 pm -03
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
