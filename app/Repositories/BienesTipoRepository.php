<?php

namespace App\Repositories;

use App\Models\BienesTipo;
use App\Repositories\BaseRepository;

/**
 * Class BienesTipoRepository
 * @package App\Repositories
 * @version October 9, 2024, 5:25 pm -03
 */

class BienesTipoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'btip_descripcion',
        'btip_detalle'
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
