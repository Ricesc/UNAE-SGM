<?php

namespace App\Http\Controllers;

use App\DataTables\SectorDataTable;
use App\Http\Requests\CreateSectorRequest;
use App\Http\Requests\UpdateSectorRequest;
use App\Repositories\SectorRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Edificio;
use App\Models\Piso;
use App\Models\Sector;
use App\Models\Sector;
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
        // Obtener todos los edificios
        $edificios = Edificio::pluck('edif_descripcion', 'edif_id');

        // Obtener todos los pisos y agruparlos por edificio
        $pisosPorEdificio = Piso::all()->groupBy('edif_id')->map(function ($pisos) {
            return $pisos->pluck('piso_descripcion', 'piso_id')->toArray();
        });

        return view('sectores.create', compact('edificios', 'pisosPorEdificio'));
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
        $sector = Sector::with(['piso.edif'])->findOrFail($id);

        if (empty($sector)) {
            Flash::error('Sector not found');

            return redirect(route('sectores.index'));
        }

        return view('sectores.show', compact('sector'));
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
        // Obtener el sector por el ID
        $sector = Sector::find($id);
    
        // Obtener los pisos disponibles
        $piso = Piso::pluck('piso_descripcion', 'piso_id')->toArray();  // Asumiendo que 'nombre' es el campo que quieres mostrar y 'id' es el valor
    
        // Verificar si el sector existe
        $sector = Sector::with('piso.edif')->find($id);

        if (empty($sector)) {
            Flash::error('Sector not found');
            return redirect(route('sectores.index'));
        }

        // Obtener todos los edificios
        $edificios = Edificio::pluck('edif_descripcion', 'edif_id');

        // Obtener los pisos de cada edificio utilizando la relación 'pisos'
        $pisosPorEdificio = Edificio::with('pisos')->get()->mapWithKeys(function ($edificio) {
            return [
                $edificio->edif_id => $edificio->pisos->pluck('piso_descripcion', 'piso_id')->toArray()
            ];
        });

        return view('sectores.edit', compact('sector', 'edificios', 'pisosPorEdificio'));
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
