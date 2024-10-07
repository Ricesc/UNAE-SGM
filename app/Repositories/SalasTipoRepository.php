<?php

namespace App\Repositories;

use App\Models\SalasTipo;
use App\Repositories\BaseRepository;

/**
 * Class SalasTipoRepository
 * @package App\Repositories
 * @version October 7, 2024, 6:33 pm UTC
*/

class SalasTipoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'stip_descripcion'
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
        return SalasTipo::class;
    }
}
