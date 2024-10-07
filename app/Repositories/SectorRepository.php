<?php

namespace App\Repositories;

use App\Models\Sector;
use App\Repositories\BaseRepository;

/**
 * Class SectorRepository
 * @package App\Repositories
 * @version October 7, 2024, 3:33 pm UTC
*/

class SectorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'piso_id',
        'sect_descripcion',
        'sect_direccion'
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
        return Sector::class;
    }
}
