<?php

namespace App\Http\Controllers;

use App\DataTables\SalaDataTable;
use App\Http\Requests\CreateSalaRequest;
use App\Http\Requests\UpdateSalaRequest;
use App\Repositories\SalaRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Dependencia;
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
        $sala = $this->salaRepository->find($id);

        if (empty($sala)) {
            Flash::error('Sala no encontrada');

            return redirect(route('salas.index'));
        }

        return view('salas.show')->with('sala', $sala);
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
        $sala = $this->salaRepository->find($id);

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
