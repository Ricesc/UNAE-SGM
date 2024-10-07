<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEdificioRequest;
use App\Http\Requests\UpdateEdificioRequest;
use App\Repositories\EdificioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Laracasts\Flash\Flash as FlashFlash;
use Response;

class EdificioController extends AppBaseController
{
    /** @var EdificioRepository $edificioRepository*/
    private $edificioRepository;

    public function __construct(EdificioRepository $edificioRepo)
    {
        $this->edificioRepository = $edificioRepo;
    }

    /**
     * Display a listing of the Edificio.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $edificios = $this->edificioRepository->all();

        return view('edificios.index')
            ->with('edificios', $edificios);
    }

    /**
     * Show the form for creating a new Edificio.
     *
     * @return Response
     */
    public function create()
    {
        return view('edificios.create');
    }

    /**
     * Store a newly created Edificio in storage.
     *
     * @param CreateEdificioRequest $request
     *
     * @return Response
     */
    public function store(CreateEdificioRequest $request)
    {
        $input = $request->all();

        $edificio = $this->edificioRepository->create($input);

        FlashFlash::success('Edificio saved successfully.');

        return redirect(route('edificios.index'));
    }

    /**
     * Display the specified Edificio.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $edificio = $this->edificioRepository->find($id);

        if (empty($edificio)) {
            FlashFlash::error('Edificio not found');

            return redirect(route('edificios.index'));
        }

        return view('edificios.show')->with('edificio', $edificio);
    }

    /**
     * Show the form for editing the specified Edificio.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $edificio = $this->edificioRepository->find($id);

        if (empty($edificio)) {
            FlashFlash::error('Edificio not found');

            return redirect(route('edificios.index'));
        }

        return view('edificios.edit')->with('edificio', $edificio);
    }

    /**
     * Update the specified Edificio in storage.
     *
     * @param int $id
     * @param UpdateEdificioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEdificioRequest $request)
    {
        $edificio = $this->edificioRepository->find($id);

        if (empty($edificio)) {
            FlashFlash::error('Edificio not found');

            return redirect(route('edificios.index'));
        }

        $edificio = $this->edificioRepository->update($request->all(), $id);

        FlashFlash::success('Edificio updated successfully.');

        return redirect(route('edificios.index'));
    }

    /**
     * Remove the specified Edificio from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $edificio = $this->edificioRepository->find($id);

        if (empty($edificio)) {
            FlashFlash::error('Edificio not found');

            return redirect(route('edificios.index'));
        }

        $this->edificioRepository->delete($id);

        FlashFlash::success('Edificio deleted successfully.');

        return redirect(route('edificios.index'));
    }
}
