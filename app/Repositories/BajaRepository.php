<?php

namespace App\Repositories;

use App\Models\Baja;
use App\Repositories\BaseRepository;

/**
 * Class BajaRepository
 * @package App\Repositories
 * @version October 7, 2024, 7:08 pm UTC
*/

class BajaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'usu_id',
        'baja_fecha',
        'baja_estado'
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
        return Baja::class;
    }
}
