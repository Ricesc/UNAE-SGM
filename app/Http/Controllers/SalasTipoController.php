<?php

namespace App\Http\Controllers;

use App\DataTables\SalasTipoDataTable;
use App\Http\Requests\CreateSalasTipoRequest;
use App\Http\Requests\UpdateSalasTipoRequest;
use App\Repositories\SalasTipoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Laracasts\Flash\Flash;

class SalasTipoController extends AppBaseController
{
    /** @var SalasTipoRepository $salasTipoRepository*/
    private $salasTipoRepository;

    public function __construct(SalasTipoRepository $salasTipoRepo)
    {
        $this->salasTipoRepository = $salasTipoRepo;
    }

    /**
     * Display a listing of the SalasTipo.
     *
     * @param SalasTipoDataTable $salasTipoDataTable
     *
     * @return Response
     */
    public function index(SalasTipoDataTable $salasTipoDataTable)
    {
        return $salasTipoDataTable->render('salas_tipos.index');
    }

    /**
     * Show the form for creating a new SalasTipo.
     *
     * @return Response
     */
    public function create()
    {
        return view('salas_tipos.create');
    }

    /**
     * Store a newly created SalasTipo in storage.
     *
     * @param CreateSalasTipoRequest $request
     *
     * @return Response
     */
    public function store(CreateSalasTipoRequest $request)
    {
        $input = $request->all();

        $salasTipo = $this->salasTipoRepository->create($input);

        Flash::success('Salas Tipo saved successfully.');

        return redirect(route('salasTipos.index'));
    }

    /**
     * Display the specified SalasTipo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $salasTipo = $this->salasTipoRepository->find($id);

        if (empty($salasTipo)) {
            Flash::error('Salas Tipo not found');

            return redirect(route('salasTipos.index'));
        }

        return view('salas_tipos.show')->with('salasTipo', $salasTipo);
    }

    /**
     * Show the form for editing the specified SalasTipo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $salasTipo = $this->salasTipoRepository->find($id);

        if (empty($salasTipo)) {
            Flash::error('Salas Tipo not found');

            return redirect(route('salasTipos.index'));
        }

        return view('salas_tipos.edit')->with('salasTipo', $salasTipo);
    }

    /**
     * Update the specified SalasTipo in storage.
     *
     * @param int $id
     * @param UpdateSalasTipoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSalasTipoRequest $request)
    {
        $salasTipo = $this->salasTipoRepository->find($id);

        if (empty($salasTipo)) {
            Flash::error('Salas Tipo not found');

            return redirect(route('salasTipos.index'));
        }

        $salasTipo = $this->salasTipoRepository->update($request->all(), $id);

        Flash::success('Salas Tipo updated successfully.');

        return redirect(route('salasTipos.index'));
    }

    /**
     * Remove the specified SalasTipo from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $salasTipo = $this->salasTipoRepository->find($id);

        if (empty($salasTipo)) {
            Flash::error('Salas Tipo not found');

            return redirect(route('salasTipos.index'));
        }

        $this->salasTipoRepository->delete($id);

        Flash::success('Salas Tipo deleted successfully.');

        return redirect(route('salasTipos.index'));
    }
}
