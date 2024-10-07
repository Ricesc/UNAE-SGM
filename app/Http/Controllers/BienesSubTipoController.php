<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBienesSubTipoRequest;
use App\Http\Requests\UpdateBienesSubTipoRequest;
use App\Repositories\BienesSubTipoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Laracasts\Flash\Flash as FlashFlash;
use Response;

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
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $bienesSubTipos = $this->bienesSubTipoRepository->all();

        return view('bienes_sub_tipos.index')
            ->with('bienesSubTipos', $bienesSubTipos);
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

        FlashFlash::success('Bienes Sub Tipo saved successfully.');

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
            FlashFlash::error('Bienes Sub Tipo not found');

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
            FlashFlash::error('Bienes Sub Tipo not found');

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
            FlashFlash::error('Bienes Sub Tipo not found');

            return redirect(route('bienesSubTipos.index'));
        }

        $bienesSubTipo = $this->bienesSubTipoRepository->update($request->all(), $id);

        FlashFlash::success('Bienes Sub Tipo updated successfully.');

        return redirect(route('bienesSubTipos.index'));
    }

    /**
     * Remove the specified BienesSubTipo from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bienesSubTipo = $this->bienesSubTipoRepository->find($id);

        if (empty($bienesSubTipo)) {
            FlashFlash::error('Bienes Sub Tipo not found');

            return redirect(route('bienesSubTipos.index'));
        }

        $this->bienesSubTipoRepository->delete($id);

        FlashFlash::success('Bienes Sub Tipo deleted successfully.');

        return redirect(route('bienesSubTipos.index'));
    }
}
