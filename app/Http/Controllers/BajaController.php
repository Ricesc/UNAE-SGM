<?php

namespace App\Http\Controllers;

use App\DataTables\BajaDataTable;
use App\Http\Requests\CreateBajaRequest;
use App\Http\Requests\UpdateBajaRequest;
use App\Repositories\BajaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Laracasts\Flash\Flash;

class BajaController extends AppBaseController
{
    /** @var BajaRepository $bajaRepository*/
    private $bajaRepository;

    public function __construct(BajaRepository $bajaRepo)
    {
        $this->bajaRepository = $bajaRepo;
    }

    /**
     * Display a listing of the Baja.
     *
     * @param BajaDataTable $bajaDataTable
     *
     * @return Response
     */
    public function index(BajaDataTable $bajaDataTable)
    {
        return $bajaDataTable->render('bajas.index');
    }

    /**
     * Show the form for creating a new Baja.
     *
     * @return Response
     */
    public function create()
    {
        return view('bajas.create');
    }

    /**
     * Store a newly created Baja in storage.
     *
     * @param CreateBajaRequest $request
     *
     * @return Response
     */
    public function store(CreateBajaRequest $request)
    {
        $input = $request->all();

        $baja = $this->bajaRepository->create($input);

        Flash::success('Baja saved successfully.');

        return redirect(route('bajas.index'));
    }

    /**
     * Display the specified Baja.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $baja = $this->bajaRepository->find($id);

        if (empty($baja)) {
            Flash::error('Baja not found');

            return redirect(route('bajas.index'));
        }

        return view('bajas.show')->with('baja', $baja);
    }

    /**
     * Show the form for editing the specified Baja.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $baja = $this->bajaRepository->find($id);

        if (empty($baja)) {
            Flash::error('Baja not found');

            return redirect(route('bajas.index'));
        }

        return view('bajas.edit')->with('baja', $baja);
    }

    /**
     * Update the specified Baja in storage.
     *
     * @param int $id
     * @param UpdateBajaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBajaRequest $request)
    {
        $baja = $this->bajaRepository->find($id);

        if (empty($baja)) {
            Flash::error('Baja not found');

            return redirect(route('bajas.index'));
        }

        $baja = $this->bajaRepository->update($request->all(), $id);

        Flash::success('Baja updated successfully.');

        return redirect(route('bajas.index'));
    }

    /**
     * Remove the specified Baja from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $baja = $this->bajaRepository->find($id);

        if (empty($baja)) {
            Flash::error('Baja not found');

            return redirect(route('bajas.index'));
        }

        $this->bajaRepository->delete($id);

        Flash::success('Baja deleted successfully.');

        return redirect(route('bajas.index'));
    }
}
