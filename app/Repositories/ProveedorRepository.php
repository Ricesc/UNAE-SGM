<?php

namespace App\Repositories;

use App\Models\Proveedor;
use App\Repositories\BaseRepository;

/**
 * Class ProveedorRepository
 * @package App\Repositories
 * @version October 7, 2024, 7:18 pm UTC
*/

class ProveedorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'prov_nombre',
        'prov_telefono',
        'prov_ruc',
        'prov_direccion',
        'prov_localidad'
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
        return Proveedor::class;
    }
}
