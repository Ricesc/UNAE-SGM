<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBienesTipoRequest;
use App\Http\Requests\UpdateBienesTipoRequest;
use App\Repositories\BienesTipoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Laracasts\Flash\Flash as FlashFlash;
use Response;

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
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $bienesTipos = $this->bienesTipoRepository->all();

        return view('bienes_tipos.index')
            ->with('bienesTipos', $bienesTipos);
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

        FlashFlash::success('Bienes Tipo saved successfully.');

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
            FlashFlash::error('Bienes Tipo not found');

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
            FlashFlash::error('Bienes Tipo not found');

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
            FlashFlash::error('Bienes Tipo not found');

            return redirect(route('bienesTipos.index'));
        }

        $bienesTipo = $this->bienesTipoRepository->update($request->all(), $id);

        FlashFlash::success('Bienes Tipo updated successfully.');

        return redirect(route('bienesTipos.index'));
    }

    /**
     * Remove the specified BienesTipo from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bienesTipo = $this->bienesTipoRepository->find($id);

        if (empty($bienesTipo)) {
            FlashFlash::error('Bienes Tipo not found');

            return redirect(route('bienesTipos.index'));
        }

        $this->bienesTipoRepository->delete($id);

        FlashFlash::success('Bienes Tipo deleted successfully.');

        return redirect(route('bienesTipos.index'));
    }
}
