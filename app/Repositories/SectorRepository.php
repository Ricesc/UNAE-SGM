<?php

namespace App\Repositories;

use App\Models\Sector;
use App\Repositories\BaseRepository;

/**
 * Class SectorRepository
 * @package App\Repositories
 * @version October 9, 2024, 4:55 pm -03
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
