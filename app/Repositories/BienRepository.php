<?php

namespace App\Repositories;

use App\Models\Bien;
use App\Repositories\BaseRepository;

/**
 * Class BienRepository
 * @package App\Repositories
 * @version October 9, 2024, 5:22 pm -03
*/

class BienRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'btip_id',
        'sala_id',
        'idet_id',
        'bien_estado',
        'bien_codigo'
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
        return Bien::class;
    }
}
