<?php

namespace App\Http\Controllers;

use App\DataTables\BienDataTable;
use App\Http\Requests\CreateBienRequest;
use App\Http\Requests\UpdateBienRequest;
use App\Repositories\BienRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\BienesSubTipo;
use App\Models\Sala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Laracasts\Flash\Flash;

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
     * @param BienDataTable $bienDataTable
     *
     * @return Response
     */
    public function index(BienDataTable $bienDataTable)
    {
        return $bienDataTable->render('bienes.index');
    }

    /**
     * Show the form for creating a new Bien.
     *
     * @return Response
     */
    public function create()
    {
        // Obtener los bienes sub-tipo y salas sin usar toArray()
        $bienes_sub_tipo = BienesSubTipo::pluck('bsti_descripcion', 'bsti_id');
        $sala = Sala::pluck('sala_descripcion', 'sala_id');

        // Pasar los bienes_sub_tipo y sala a la vista
        return view('bienes.create', compact('bienes_sub_tipo', 'sala'));
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

        Flash::success('Bien saved successfully.');

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
            Flash::error('Bien not found');

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
        $bienes_sub_tipo = BienesSubTipo::pluck('bsti_descripcion', 'bsti_id')->toArray();
        $sala = Sala::pluck('sala_descripcion', 'sala_id')->toArray();

        if (empty($bien)) {
            Flash::error('Bien not found');

            return redirect(route('bienes.index'));
        }

        return view('bienes.edit')->with('bien', $bien, 'bienes_sub_tipo', $bienes_sub_tipo, 'sala', $sala);
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
            Flash::error('Bien not found');

            return redirect(route('bienes.index'));
        }

        $bien = $this->bienRepository->update($request->all(), $id);

        Flash::success('Bien updated successfully.');

        return redirect(route('bienes.index'));
    }

    /**
     * Remove the specified Bien from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bien = $this->bienRepository->find($id);

        if (empty($bien)) {
            Flash::error('Bien not found');

            return redirect(route('bienes.index'));
        }

        $this->bienRepository->delete($id);

        Flash::success('Bien deleted successfully.');

        return redirect(route('bienes.index'));
    }
}
