<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBajaRequest;
use App\Http\Requests\UpdateBajaRequest;
use App\Repositories\BajaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Laracasts\Flash\Flash as FlashFlash;
use Response;

class BajaController extends AppBaseController
{
    /** @var BajaRepository $bajaRepository*/
    private $bajaRepository;

    public function __construct(BajaRepository $bajaRepo)
    {
        $this->bajaRepository = $bajaRepo;
    }

    /**
     * Display a listing of the Baja.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $bajas = $this->bajaRepository->all();

        return view('bajas.index')
            ->with('bajas', $bajas);
    }

    /**
     * Show the form for creating a new Baja.
     *
     * @return Response
     */
    public function create()
    {
        return view('bajas.create');
    }

    /**
     * Store a newly created Baja in storage.
     *
     * @param CreateBajaRequest $request
     *
     * @return Response
     */
    public function store(CreateBajaRequest $request)
    {
        $input = $request->all();

        $baja = $this->bajaRepository->create($input);

        FlashFlash::success('Baja saved successfully.');

        return redirect(route('bajas.index'));
    }

    /**
     * Display the specified Baja.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $baja = $this->bajaRepository->find($id);

        if (empty($baja)) {
            FlashFlash::error('Baja not found');

            return redirect(route('bajas.index'));
        }

        return view('bajas.show')->with('baja', $baja);
    }

    /**
     * Show the form for editing the specified Baja.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $baja = $this->bajaRepository->find($id);

        if (empty($baja)) {
            FlashFlash::error('Baja not found');

            return redirect(route('bajas.index'));
        }

        return view('bajas.edit')->with('baja', $baja);
    }

    /**
     * Update the specified Baja in storage.
     *
     * @param int $id
     * @param UpdateBajaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBajaRequest $request)
    {
        $baja = $this->bajaRepository->find($id);

        if (empty($baja)) {
            FlashFlash::error('Baja not found');

            return redirect(route('bajas.index'));
        }

        $baja = $this->bajaRepository->update($request->all(), $id);

        FlashFlash::success('Baja updated successfully.');

        return redirect(route('bajas.index'));
    }

    /**
     * Remove the specified Baja from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $baja = $this->bajaRepository->find($id);

        if (empty($baja)) {
            FlashFlash::error('Baja not found');

            return redirect(route('bajas.index'));
        }

        $this->bajaRepository->delete($id);

        FlashFlash::success('Baja deleted successfully.');

        return redirect(route('bajas.index'));
    }
}
