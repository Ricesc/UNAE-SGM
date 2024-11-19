<?php

namespace App\Http\Controllers;

use App\DataTables\BienesTipoDataTable;
use App\Http\Requests\CreateBienesTipoRequest;
use App\Http\Requests\UpdateBienesTipoRequest;
use App\Repositories\BienesTipoRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\BienesTipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Laracasts\Flash\Flash;

class BienesTipoController extends AppBaseController
{
    /** @var BienesTipoRepository $bienesTipoRepository*/
    private $bienesTipoRepository;

    public function __construct(BienesTipoRepository $bienesTipoRepo)
    {
        $this->bienesTipoRepository = $bienesTipoRepo;
    }

    /**
     * Display a listing of the BienesTipo.
     *
     * @param BienesTipoDataTable $bienesTipoDataTable
     *
     * @return Response
     */
    public function index(BienesTipoDataTable $bienesTipoDataTable)
    {
        return $bienesTipoDataTable->render('bienes_tipos.index');
    }

    public function autocomplete(Request $request)
    {
        $term = $request->get('term');
        $tipos = BienesTipo::where('btip_descripcion', 'LIKE', "%{$term}%")
            ->pluck('btip_descripcion')
            ->toArray();

        return response()->json($tipos);
    }


    /**
     * Show the form for creating a new BienesTipo.
     *
     * @return Response
     */
    public function create()
    {
        return view('bienes_tipos.create');
    }

    /**
     * Store a newly created BienesTipo in storage.
     *
     * @param CreateBienesTipoRequest $request
     *
     * @return Response
     */
    public function store(CreateBienesTipoRequest $request)
    {
        $input = $request->all();

        $bienesTipo = $this->bienesTipoRepository->create($input);

        Flash::success('Bienes Tipo saved successfully.');

        return redirect(route('bienesTipos.index'));
    }

    /**
     * Display the specified BienesTipo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bienesTipo = $this->bienesTipoRepository->find($id);

        if (empty($bienesTipo)) {
            Flash::error('Bienes Tipo not found');

            return redirect(route('bienesTipos.index'));
        }

        return view('bienes_tipos.show')->with('bienesTipo', $bienesTipo);
    }

    /**
     * Show the form for editing the specified BienesTipo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bienesTipo = $this->bienesTipoRepository->find($id);

        if (empty($bienesTipo)) {
            Flash::error('Bienes Tipo not found');

            return redirect(route('bienesTipos.index'));
        }

        return view('bienes_tipos.edit')->with('bienesTipo', $bienesTipo);
    }

    /**
     * Update the specified BienesTipo in storage.
     *
     * @param int $id
     * @param UpdateBienesTipoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBienesTipoRequest $request)
    {
        $bienesTipo = $this->bienesTipoRepository->find($id);

        if (empty($bienesTipo)) {
            Flash::error('Bienes Tipo not found');

            return redirect(route('bienesTipos.index'));
        }

        $bienesTipo = $this->bienesTipoRepository->update($request->all(), $id);

        Flash::success('Bienes Tipo updated successfully.');

        return redirect(route('bienesTipos.index'));
    }

    /**
     * Remove the specified BienesTipo from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bienesTipo = $this->bienesTipoRepository->find($id);

        if (empty($bienesTipo)) {
            Flash::error('Bienes Tipo not found');

            return redirect(route('bienesTipos.index'));
        }

        $this->bienesTipoRepository->delete($id);

        Flash::success('Bienes Tipo deleted successfully.');

        return redirect(route('bienesTipos.index'));
    }
}
