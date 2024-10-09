<?php

namespace App\Repositories;

use App\Models\Baja;
use App\Repositories\BaseRepository;

/**
 * Class BajaRepository
 * @package App\Repositories
 * @version October 9, 2024, 5:19 pm -03
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
