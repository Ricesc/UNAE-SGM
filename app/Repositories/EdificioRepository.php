<?php

namespace App\Repositories;

use App\Models\Edificio;
use App\Repositories\BaseRepository;

/**
 * Class EdificioRepository
 * @package App\Repositories
 * @version October 7, 2024, 4:51 pm UTC
*/

class EdificioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'edif_descripcion',
        'edif_direccion'
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
        return Edificio::class;
    }
}
