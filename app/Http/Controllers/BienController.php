<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBienRequest;
use App\Http\Requests\UpdateBienRequest;
use App\Repositories\BienRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Laracasts\Flash\Flash as FlashFlash;
use Response;

class BienController extends AppBaseController
{
    /** @var BienRepository $bienRepository*/
    private $bienRepository;

    public function __construct(BienRepository $bienRepo)
    {
        $this->bienRepository = $bienRepo;
    }

    /**
     * Display a listing of the Bien.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $bienes = $this->bienRepository->all();

        return view('bienes.index')
            ->with('bienes', $bienes);
    }

    /**
     * Show the form for creating a new Bien.
     *
     * @return Response
     */
    public function create()
    {
        return view('bienes.create');
    }

    /**
     * Store a newly created Bien in storage.
     *
     * @param CreateBienRequest $request
     *
     * @return Response
     */
    public function store(CreateBienRequest $request)
    {
        $input = $request->all();

        $bien = $this->bienRepository->create($input);

        FlashFlash::success('Bien saved successfully.');

        return redirect(route('bienes.index'));
    }

    /**
     * Display the specified Bien.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bien = $this->bienRepository->find($id);

        if (empty($bien)) {
            FlashFlash::error('Bien not found');

            return redirect(route('bienes.index'));
        }

        return view('bienes.show')->with('bien', $bien);
    }

    /**
     * Show the form for editing the specified Bien.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bien = $this->bienRepository->find($id);

        if (empty($bien)) {
            FlashFlash::error('Bien not found');

            return redirect(route('bienes.index'));
        }

        return view('bienes.edit')->with('bien', $bien);
    }

    /**
     * Update the specified Bien in storage.
     *
     * @param int $id
     * @param UpdateBienRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBienRequest $request)
    {
        $bien = $this->bienRepository->find($id);

        if (empty($bien)) {
            FlashFlash::error('Bien not found');

            return redirect(route('bienes.index'));
        }

        $bien = $this->bienRepository->update($request->all(), $id);

        FlashFlash::success('Bien updated successfully.');

        return redirect(route('bienes.index'));
    }

    /**
     * Remove the specified Bien from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bien = $this->bienRepository->find($id);

        if (empty($bien)) {
            FlashFlash::error('Bien not found');

            return redirect(route('bienes.index'));
        }

        $this->bienRepository->delete($id);

        FlashFlash::success('Bien deleted successfully.');

        return redirect(route('bienes.index'));
    }
}
