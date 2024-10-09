<?php

namespace App\Repositories;

use App\Models\Dependencia;
use App\Repositories\BaseRepository;

/**
 * Class DependenciaRepository
 * @package App\Repositories
 * @version October 9, 2024, 5:13 pm -03
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
