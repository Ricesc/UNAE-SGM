<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePisoRequest;
use App\Http\Requests\UpdatePisoRequest;
use App\Repositories\PisoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Laracasts\Flash\Flash as FlashFlash;
use Response;

class PisoController extends AppBaseController
{
    /** @var PisoRepository $pisoRepository*/
    private $pisoRepository;

    public function __construct(PisoRepository $pisoRepo)
    {
        $this->pisoRepository = $pisoRepo;
    }

    /**
     * Display a listing of the Piso.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pisos = $this->pisoRepository->all();

        return view('pisos.index')
            ->with('pisos', $pisos);
    }

    /**
     * Show the form for creating a new Piso.
     *
     * @return Response
     */
    public function create()
    {
        return view('pisos.create');
    }

    /**
     * Store a newly created Piso in storage.
     *
     * @param CreatePisoRequest $request
     *
     * @return Response
     */
    public function store(CreatePisoRequest $request)
    {
        $input = $request->all();

        $piso = $this->pisoRepository->create($input);

        FlashFlash::success('Piso saved successfully.');

        return redirect(route('pisos.index'));
    }

    /**
     * Display the specified Piso.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $piso = $this->pisoRepository->find($id);

        if (empty($piso)) {
            FlashFlash::error('Piso not found');

            return redirect(route('pisos.index'));
        }

        return view('pisos.show')->with('piso', $piso);
    }

    /**
     * Show the form for editing the specified Piso.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $piso = $this->pisoRepository->find($id);

        if (empty($piso)) {
            FlashFlash::error('Piso not found');

            return redirect(route('pisos.index'));
        }

        return view('pisos.edit')->with('piso', $piso);
    }

    /**
     * Update the specified Piso in storage.
     *
     * @param int $id
     * @param UpdatePisoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePisoRequest $request)
    {
        $piso = $this->pisoRepository->find($id);

        if (empty($piso)) {
            FlashFlash::error('Piso not found');

            return redirect(route('pisos.index'));
        }

        $piso = $this->pisoRepository->update($request->all(), $id);

        FlashFlash::success('Piso updated successfully.');

        return redirect(route('pisos.index'));
    }

    /**
     * Remove the specified Piso from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $piso = $this->pisoRepository->find($id);

        if (empty($piso)) {
            FlashFlash::error('Piso not found');

            return redirect(route('pisos.index'));
        }

        $this->pisoRepository->delete($id);

        FlashFlash::success('Piso deleted successfully.');

        return redirect(route('pisos.index'));
    }
}
