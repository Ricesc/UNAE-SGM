<?php

namespace App\Http\Controllers;

use App\DataTables\BienesSubTipoDataTable;
use App\Http\Requests\CreateBienesSubTipoRequest;
use App\Http\Requests\UpdateBienesSubTipoRequest;
use App\Repositories\BienesSubTipoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Laracasts\Flash\Flash;

class BienesSubTipoController extends AppBaseController
{
    /** @var BienesSubTipoRepository $bienesSubTipoRepository*/
    private $bienesSubTipoRepository;

    public function __construct(BienesSubTipoRepository $bienesSubTipoRepo)
    {
        $this->bienesSubTipoRepository = $bienesSubTipoRepo;
    }

    /**
     * Display a listing of the BienesSubTipo.
     *
     * @param BienesSubTipoDataTable $bienesSubTipoDataTable
     *
     * @return Response
     */
    public function index(BienesSubTipoDataTable $bienesSubTipoDataTable)
    {
        return $bienesSubTipoDataTable->render('bienes_sub_tipos.index');
    }

    /**
     * Show the form for creating a new BienesSubTipo.
     *
     * @return Response
     */
    public function create()
    {
        return view('bienes_sub_tipos.create');
    }

    /**
     * Store a newly created BienesSubTipo in storage.
     *
     * @param CreateBienesSubTipoRequest $request
     *
     * @return Response
     */
    public function store(CreateBienesSubTipoRequest $request)
    {
        $input = $request->all();

        $bienesSubTipo = $this->bienesSubTipoRepository->create($input);

        Flash::success('Bienes Sub Tipo saved successfully.');

        return redirect(route('bienesSubTipos.index'));
    }

    /**
     * Display the specified BienesSubTipo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bienesSubTipo = $this->bienesSubTipoRepository->find($id);

        if (empty($bienesSubTipo)) {
            Flash::error('Bienes Sub Tipo not found');

            return redirect(route('bienesSubTipos.index'));
        }

        return view('bienes_sub_tipos.show')->with('bienesSubTipo', $bienesSubTipo);
    }

    /**
     * Show the form for editing the specified BienesSubTipo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bienesSubTipo = $this->bienesSubTipoRepository->find($id);

        if (empty($bienesSubTipo)) {
            Flash::error('Bienes Sub Tipo not found');

            return redirect(route('bienesSubTipos.index'));
        }

        return view('bienes_sub_tipos.edit')->with('bienesSubTipo', $bienesSubTipo);
    }

    /**
     * Update the specified BienesSubTipo in storage.
     *
     * @param int $id
     * @param UpdateBienesSubTipoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBienesSubTipoRequest $request)
    {
        $bienesSubTipo = $this->bienesSubTipoRepository->find($id);

        if (empty($bienesSubTipo)) {
            Flash::error('Bienes Sub Tipo not found');

            return redirect(route('bienesSubTipos.index'));
        }

        $bienesSubTipo = $this->bienesSubTipoRepository->update($request->all(), $id);

        Flash::success('Bienes Sub Tipo updated successfully.');

        return redirect(route('bienesSubTipos.index'));
    }

    /**
     * Remove the specified BienesSubTipo from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bienesSubTipo = $this->bienesSubTipoRepository->find($id);

        if (empty($bienesSubTipo)) {
            Flash::error('Bienes Sub Tipo not found');

            return redirect(route('bienesSubTipos.index'));
        }

        $this->bienesSubTipoRepository->delete($id);

        Flash::success('Bienes Sub Tipo deleted successfully.');

        return redirect(route('bienesSubTipos.index'));
    }
}
