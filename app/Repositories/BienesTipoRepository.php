<?php

namespace App\Repositories;

use App\Models\BienesTipo;
use App\Repositories\BaseRepository;

/**
 * Class BienesTipoRepository
 * @package App\Repositories
 * @version October 9, 2024, 5:28 pm -03
*/

class BienesTipoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'bsti_id',
        'btip_descripcion',
        'btip_detalle',
        'btip_costo'
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
        return BienesTipo::class;
    }
}
