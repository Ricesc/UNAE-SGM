<?php

namespace App\Repositories;

use App\Models\Sala;
use App\Repositories\BaseRepository;

/**
 * Class SalaRepository
 * @package App\Repositories
 * @version October 7, 2024, 5:14 pm UTC
*/

class SalaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sect_id',
        'stip_id',
        'depe_id',
        'sala_descripcion',
        'sala_direccion',
        'sala_capacidad'
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
        return Sala::class;
    }
}