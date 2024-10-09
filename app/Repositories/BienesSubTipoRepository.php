<?php

namespace App\Repositories;

use App\Models\BienesSubTipo;
use App\Repositories\BaseRepository;

/**
 * Class BienesSubTipoRepository
 * @package App\Repositories
 * @version October 9, 2024, 5:25 pm -03
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
