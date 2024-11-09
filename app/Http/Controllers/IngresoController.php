<?php

namespace App\Http\Controllers;

use App\DataTables\IngresoDataTable;
use App\Http\Requests\CreateIngresoRequest;
use App\Http\Requests\UpdateIngresoRequest;
use App\Repositories\IngresoRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Laracasts\Flash\Flash;

class IngresoController extends AppBaseController
{
    /** @var IngresoRepository $ingresoRepository*/
    private $ingresoRepository;

    public function __construct(IngresoRepository $ingresoRepo)
    {
        $this->ingresoRepository = $ingresoRepo;
    }

    /**
     * Display a listing of the Ingreso.
     *
     * @param IngresoDataTable $ingresoDataTable
     *
     * @return Response
     */
    public function index(IngresoDataTable $ingresoDataTable)
    {
        return $ingresoDataTable->render('ingresos.index');
    }

    /**
     * Show the form for creating a new Ingreso.
     *
     * @return Response
     */
    public function create()
    {
        $proveedores = Proveedor::pluck('prov_nombre', 'prov_id')->toArray(); // Obtén los datos de los proveedores
        $usuarios = User::pluck('name', 'usu_id')->toArray(); // Obtén los datos de los usuarios

        return view('ingresos.create')->with('proveedores', $proveedores, 'usuarios', $usuarios); // Pasar los datos a la vista
    }



    /**
     * Store a newly created Ingreso in storage.
     *
     * @param CreateIngresoRequest $request
     *
     * @return Response
     */
    public function store(CreateIngresoRequest $request)
    {
        $input = $request->all();

        $ingreso = $this->ingresoRepository->create($input);

        Flash::success('Ingreso guardado correctamente.');

        return redirect(route('ingresos.index'));
    }

    /**
     * Display the specified Ingreso.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ingreso = $this->ingresoRepository->find($id);
        $proveedores = Proveedor::pluck('prov_nombre', 'prov_id')->toArray();  // Obtener id y nombre de proveedores
        $usuarios = User::pluck('name', 'id')->toArray();


        if (empty($ingreso)) {
            Flash::error('Ingreso not found');

            return redirect(route('ingresos.index'));
        }

        return view('ingresos.show')->with('ingreso', $ingreso, 'proveedores', $proveedores, 'usuarios', $usuarios);
    }

    /**
     * Show the form for editing the specified Ingreso.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        // Obtener el ingreso por el ID
        $ingreso = $this->ingresoRepository->find($id);

        // Verificar si el ingreso existe
        if (empty($ingreso)) {
            Flash::error('Ingreso not found');
            return redirect(route('ingresos.index'));
        }

        // Obtener los proveedores y usuarios desde la base de datos
        $proveedores = Proveedor::pluck('prov_nombre', 'prov_id')->toArray();  // Obtener id y nombre de proveedores
        $usuarios = User::pluck('name', 'id')->toArray();       // Obtener id y nombre de usuarios

        // Pasar el ingreso, proveedores y usuarios a la vista
        return view('ingresos.edit', compact('ingreso', 'proveedores', 'usuarios'));
    }

    /**
     * Update the specified Ingreso in storage.
     *
     * @param int $id
     * @param UpdateIngresoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIngresoRequest $request)
    {
        $ingreso = $this->ingresoRepository->find($id);

        if (empty($ingreso)) {
            Flash::error('Ingreso not found');

            return redirect(route('ingresos.index'));
        }

        $ingreso = $this->ingresoRepository->update($request->all(), $id);

        Flash::success('Ingreso actualizado correctamente.');

        return redirect(route('ingresos.index'));
    }

    /**
     * Remove the specified Ingreso from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ingreso = $this->ingresoRepository->find($id);

        if (empty($ingreso)) {
            Flash::error('Ingreso not found');

            return redirect(route('ingresos.index'));
        }

        $this->ingresoRepository->delete($id);

        Flash::success('Ingreso eliminado correctamente.');

        return redirect(route('ingresos.index'));
    }
}
