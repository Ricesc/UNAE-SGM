<?php

namespace App\Repositories;

use App\Models\Transferencia;
use App\Repositories\BaseRepository;

/**
 * Class TransferenciaRepository
 * @package App\Repositories
 * @version October 7, 2024, 7:02 pm UTC
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
