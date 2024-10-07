<?php

namespace App\Repositories;

use App\Models\Bien;
use App\Repositories\BaseRepository;

/**
 * Class BienRepository
 * @package App\Repositories
 * @version October 7, 2024, 7:11 pm UTC
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
