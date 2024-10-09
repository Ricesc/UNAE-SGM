<?php

namespace App\Repositories;

use App\Models\SalasTipo;
use App\Repositories\BaseRepository;

/**
 * Class SalasTipoRepository
 * @package App\Repositories
 * @version October 9, 2024, 5:06 pm -03
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
