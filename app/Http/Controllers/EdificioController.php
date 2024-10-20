<?php

namespace App\Http\Controllers;

use App\DataTables\EdificioDataTable;
use App\Http\Requests\CreateEdificioRequest;
use App\Http\Requests\UpdateEdificioRequest;
use App\Repositories\EdificioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Laracasts\Flash\Flash;

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
     * @param EdificioDataTable $edificioDataTable
     *
     * @return Response
     */
    public function index(EdificioDataTable $edificioDataTable)
    {
        return $edificioDataTable->render('edificios.index');
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

        Flash::success('Edificio saved successfully.');

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
            Flash::error('Edificio not found');

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
            Flash::error('Edificio not found');

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
            Flash::error('Edificio not found');

            return redirect(route('edificios.index'));
        }

        $edificio = $this->edificioRepository->update($request->all(), $id);

        Flash::success('Edificio updated successfully.');

        return redirect(route('edificios.index'));
    }

    /**
     * Remove the specified Edificio from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $edificio = $this->edificioRepository->find($id);

        if (empty($edificio)) {
            Flash::error('Edificio not found');

            return redirect(route('edificios.index'));
        }

        $this->edificioRepository->delete($id);

        Flash::success('Edificio deleted successfully.');

        return redirect(route('edificios.index'));
    }
}
