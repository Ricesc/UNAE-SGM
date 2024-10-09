<?php

namespace App\Repositories;

use App\Models\Piso;
use App\Repositories\BaseRepository;

/**
 * Class PisoRepository
 * @package App\Repositories
 * @version October 9, 2024, 2:13 pm -03
*/

class PisoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'edif_id',
        'piso_descripcion',
        'piso_direccion'
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
        return Piso::class;
    }
}
