<?php

namespace App\Repositories;

use App\Models\Transferencia;
use App\Repositories\BaseRepository;

/**
 * Class TransferenciaRepository
 * @package App\Repositories
 * @version October 9, 2024, 5:16 pm -03
*/

class TransferenciaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sala_id',
        'usu_id',
        'tran_fecha',
        'tran_procesado'
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
        return Transferencia::class;
    }
}
