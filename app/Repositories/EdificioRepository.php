<?php

namespace App\Repositories;

use App\Models\Edificio;
use App\Repositories\BaseRepository;

/**
 * Class EdificioRepository
 * @package App\Repositories
 * @version October 9, 2024, 2:00 pm -03
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
