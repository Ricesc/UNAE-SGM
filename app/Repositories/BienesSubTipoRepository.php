<?php

namespace App\Repositories;

use App\Models\BienesSubTipo;
use App\Repositories\BaseRepository;

/**
 * Class BienesSubTipoRepository
 * @package App\Repositories
 * @version October 7, 2024, 7:46 pm UTC
*/

class BienesSubTipoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'bsti_descripcion',
        'bsti_detalle'
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
        return BienesSubTipo::class;
    }
}
