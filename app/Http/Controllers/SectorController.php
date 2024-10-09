<?php

namespace App\Http\Controllers;

use App\DataTables\SectorDataTable;
use App\Http\Requests\CreateSectorRequest;
use App\Http\Requests\UpdateSectorRequest;
use App\Repositories\SectorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Laracasts\Flash\Flash;

class SectorController extends AppBaseController
{
    /** @var SectorRepository $sectorRepository*/
    private $sectorRepository;

    public function __construct(SectorRepository $sectorRepo)
    {
        $this->sectorRepository = $sectorRepo;
    }

    /**
     * Display a listing of the Sector.
     *
     * @param SectorDataTable $sectorDataTable
     *
     * @return Response
     */
    public function index(SectorDataTable $sectorDataTable)
    {
        return $sectorDataTable->render('sectores.index');
    }

    /**
     * Show the form for creating a new Sector.
     *
     * @return Response
     */
    public function create()
    {
        return view('sectores.create');
    }

    /**
     * Store a newly created Sector in storage.
     *
     * @param CreateSectorRequest $request
     *
     * @return Response
     */
    public function store(CreateSectorRequest $request)
    {
        $input = $request->all();

        $sector = $this->sectorRepository->create($input);

        Flash::success('Sector saved successfully.');

        return redirect(route('sectores.index'));
    }

    /**
     * Display the specified Sector.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sector = $this->sectorRepository->find($id);

        if (empty($sector)) {
            Flash::error('Sector not found');

            return redirect(route('sectores.index'));
        }

        return view('sectores.show')->with('sector', $sector);
    }

    /**
     * Show the form for editing the specified Sector.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sector = $this->sectorRepository->find($id);

        if (empty($sector)) {
            Flash::error('Sector not found');

            return redirect(route('sectores.index'));
        }

        return view('sectores.edit')->with('sector', $sector);
    }

    /**
     * Update the specified Sector in storage.
     *
     * @param int $id
     * @param UpdateSectorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSectorRequest $request)
    {
        $sector = $this->sectorRepository->find($id);

        if (empty($sector)) {
            Flash::error('Sector not found');

            return redirect(route('sectores.index'));
        }

        $sector = $this->sectorRepository->update($request->all(), $id);

        Flash::success('Sector updated successfully.');

        return redirect(route('sectores.index'));
    }

    /**
     * Remove the specified Sector from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sector = $this->sectorRepository->find($id);

        if (empty($sector)) {
            Flash::error('Sector not found');

            return redirect(route('sectores.index'));
        }

        $this->sectorRepository->delete($id);

        Flash::success('Sector deleted successfully.');

        return redirect(route('sectores.index'));
    }
}
