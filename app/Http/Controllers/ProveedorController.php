<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProveedorRequest;
use App\Http\Requests\UpdateProveedorRequest;
use App\Repositories\ProveedorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Laracasts\Flash\Flash;

class ProveedorController extends AppBaseController
{
    /** @var ProveedorRepository $proveedorRepository*/
    private $proveedorRepository;

    public function __construct(ProveedorRepository $proveedorRepo)
    {
        $this->proveedorRepository = $proveedorRepo;
    }

    /**
     * Display a listing of the Proveedor.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $proveedores = $this->proveedorRepository->all();

        return view('proveedores.index')
            ->with('proveedores', $proveedores);
    }

    /**
     * Show the form for creating a new Proveedor.
     *
     * @return Response
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created Proveedor in storage.
     *
     * @param CreateProveedorRequest $request
     *
     * @return Response
     */
    public function store(CreateProveedorRequest $request)
    {
        $input = $request->all();

        $proveedor = $this->proveedorRepository->create($input);

        Flash::success('Proveedor saved successfully.');

        return redirect(route('proveedores.index'));
    }

    /**
     * Display the specified Proveedor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $proveedor = $this->proveedorRepository->find($id);

        if (empty($proveedor)) {
            Flash::error('Proveedor not found');

            return redirect(route('proveedores.index'));
        }

        return view('proveedores.show')->with('proveedor', $proveedor);
    }

    /**
     * Show the form for editing the specified Proveedor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $proveedor = $this->proveedorRepository->find($id);

        if (empty($proveedor)) {
            Flash::error('Proveedor not found');

            return redirect(route('proveedores.index'));
        }

        return view('proveedores.edit')->with('proveedor', $proveedor);
    }

    /**
     * Update the specified Proveedor in storage.
     *
     * @param int $id
     * @param UpdateProveedorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProveedorRequest $request)
    {
        $proveedor = $this->proveedorRepository->find($id);

        if (empty($proveedor)) {
            Flash::error('Proveedor not found');

            return redirect(route('proveedores.index'));
        }

        $proveedor = $this->proveedorRepository->update($request->all(), $id);

        Flash::success('Proveedor updated successfully.');

        return redirect(route('proveedores.index'));
    }

    /**
     * Remove the specified Proveedor from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $proveedor = $this->proveedorRepository->find($id);

        if (empty($proveedor)) {
            Flash::error('Proveedor not found');

            return redirect(route('proveedores.index'));
        }

        $this->proveedorRepository->delete($id);

        Flash::success('Proveedor deleted successfully.');

        return redirect(route('proveedores.index'));
    }
}
