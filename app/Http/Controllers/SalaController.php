<?php

namespace App\Http\Controllers;

use App\DataTables\SalaDataTable;
use App\Http\Requests\CreateSalaRequest;
use App\Http\Requests\UpdateSalaRequest;
use App\Repositories\SalaRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Dependencia;
use App\Models\Edificio;
use App\Models\Piso;
use App\Models\Sala;
use App\Models\SalasTipo;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Laracasts\Flash\Flash;

class SalaController extends AppBaseController
{
    /** @var SalaRepository $salaRepository*/
    private $salaRepository;

    public function __construct(SalaRepository $salaRepo)
    {
        $this->salaRepository = $salaRepo;
    }

    /**
     * Display a listing of the Sala.
     *
     * @param SalaDataTable $salaDataTable
     *
     * @return Response
     */
    public function index(SalaDataTable $salaDataTable)
    {
        return $salaDataTable->render('salas.index');
    }

    /**
     * Show the form for creating a new Sala.
     *
     * @return Response
     */
    public function create()
    {
        $sectores = Sector::pluck('sect_descripcion', 'sect_id');
        $salasTipos = SalasTipo::pluck('stip_descripcion', 'stip_id');
        $dependencias = Dependencia::pluck('depe_descripcion', 'depe_id');

        return view('salas.create')->with([
            'sectores' => $sectores,
            'salasTipos' => $salasTipos,
            'dependencias' => $dependencias
        ]);

        // Obtener todas las dependencias
        $dependencias = Dependencia::pluck('depe_descripcion', 'depe_id');

        // Obtener todos los tipos de salas
        $salasTipo = SalasTipo::pluck('stip_descripcion', 'stip_id');

        // Obtener todos los edificios
        $edificios = Edificio::pluck('edif_descripcion', 'edif_id');

        // Obtener pisos agrupados por edificio
        $pisosPorEdificio = Piso::all()->groupBy('edif_id')->map(function ($pisos) {
            return $pisos->pluck('piso_descripcion', 'piso_id')->toArray();
        });

        // Obtener sectores agrupados por piso
        $sectoresPorPiso = Sector::all()->groupBy('piso_id')->map(function ($sectores) {
            return $sectores->pluck('sect_descripcion', 'sect_id')->toArray();
        });

        return view('salas.create', compact('dependencias', 'salasTipo', 'edificios', 'pisosPorEdificio', 'sectoresPorPiso'));
    }


    /**
     * Store a newly created Sala in storage.
     *
     * @param CreateSalaRequest $request
     *
     * @return Response
     */
    public function store(CreateSalaRequest $request)
    {
        $input = $request->all();

        $sala = $this->salaRepository->create($input);

        Flash::success('Sala guardada exitosamente.');

        return redirect(route('salas.index'));
    }

    /**
     * Display the specified Sala.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        // Cargar la sala con su sector, piso y edificio relacionados
        $sala = Sala::with(['sector.piso.edif'])->findOrFail($id);

        if (empty($sala)) {
            Flash::error('Sala no encontrada');

            Flash::error('Sala not found');
            return redirect(route('salas.index'));
        }

        return view('salas.show', compact('sala'));
    }

    /**
     * Show the form for editing the specified Sala.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        // Cargar la sala con su sector y relaciones anidadas
        $sala = Sala::with('sector.piso.edif')->find($id);

        if (empty($sala)) {
            Flash::error('Sala no encontrada');
            return redirect(route('salas.index'));
        }

        $sectores = Sector::pluck('sect_descripcion', 'sect_id');
        $tipos = SalasTipo::pluck('stip_descripcion', 'stip_id');
        $dependencias = Dependencia::pluck('depe_descripcion', 'depe_id');
        

        return view('salas.edit')->with([
            'sala' => $sala,
            'sectores' => $sectores,
            'tipos' => $tipos,
            'dependencias' => $dependencias
        ]);
        // Obtener todas las dependencias
        $dependencias = Dependencia::pluck('depe_descripcion', 'depe_id');

        // Obtener todos los tipos de salas
        $salasTipo = SalasTipo::pluck('stip_descripcion', 'stip_id');

        // Obtener todos los edificios
        $edificios = Edificio::pluck('edif_descripcion', 'edif_id');

        // Obtener los pisos agrupados por edificio
        $pisosPorEdificio = Edificio::with('pisos')->get()->mapWithKeys(function ($edificio) {
            return [
                $edificio->edif_id => $edificio->pisos->pluck('piso_descripcion', 'piso_id')->toArray()
            ];
        });

        // Obtener sectores agrupados por piso
        $sectoresPorPiso = Piso::with('sectores')->get()->mapWithKeys(function ($piso) {
            return [
                $piso->piso_id => $piso->sectores->pluck('sect_descripcion', 'sect_id')->toArray()
            ];
        });

        return view('salas.edit', compact('dependencias', 'salasTipo', 'sala', 'edificios', 'pisosPorEdificio', 'sectoresPorPiso'));
    }


    /**
     * Update the specified Sala in storage.
     *
     * @param int $id
     * @param UpdateSalaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSalaRequest $request)
    {
        $sala = $this->salaRepository->find($id);

        if (empty($sala)) {
            Flash::error('Sala no encontrada');

            return redirect(route('salas.index'));
        }

        $sala = $this->salaRepository->update($request->all(), $id);

        Flash::success('Sala actualizada exitosamente.');

        return redirect(route('salas.index'));
    }

    /**
     * Remove the specified Sala from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sala = $this->salaRepository->find($id);

        if (empty($sala)) {
            Flash::error('Sala no encontrada');

            return redirect(route('salas.index'));
        }

        $this->salaRepository->delete($id);

        Flash::success('Sala eliminada exitosamente.');

        return redirect(route('salas.index'));
    }
}
