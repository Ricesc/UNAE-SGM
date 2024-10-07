<?php

namespace App\Repositories;

use App\Models\Dependencia;
use App\Repositories\BaseRepository;

/**
 * Class DependenciaRepository
 * @package App\Repositories
 * @version October 7, 2024, 6:52 pm UTC
*/

class DependenciaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'depe_descripcion',
        'depe_telefono'
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
        return Dependencia::class;
    }
}
