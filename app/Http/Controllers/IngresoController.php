<?php

namespace App\Http\Controllers;

use App\DataTables\IngresoDataTable;
use App\Http\Requests\CreateIngresoRequest;
use App\Http\Requests\UpdateIngresoRequest;
use App\Repositories\IngresoRepository;
use App\Http\Controllers\AppBaseController;
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
        return view('ingresos.create');
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

        Flash::success('Ingreso saved successfully.');

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

        if (empty($ingreso)) {
            Flash::error('Ingreso not found');

            return redirect(route('ingresos.index'));
        }

        return view('ingresos.show')->with('ingreso', $ingreso);
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
        $ingreso = $this->ingresoRepository->find($id);

        if (empty($ingreso)) {
            Flash::error('Ingreso not found');

            return redirect(route('ingresos.index'));
        }

        return view('ingresos.edit')->with('ingreso', $ingreso);
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

        Flash::success('Ingreso updated successfully.');

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

        Flash::success('Ingreso deleted successfully.');

        return redirect(route('ingresos.index'));
    }
}
