<?php

namespace App\Http\Controllers;

use App\DataTables\IngresoDataTable;
use App\Http\Requests\CreateIngresoRequest;
use App\Http\Requests\UpdateIngresoRequest;
use App\Repositories\IngresoRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Ingreso;
use App\Models\IngresosDet;
use App\Models\Bien;
use App\Models\Edificio;
use App\Models\Piso;
use App\Models\Sector;
use App\Models\Sala;
use App\Models\Proveedor;
use App\Models\BienesTipo;
use App\Models\BienesSubTipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class IngresoController extends AppBaseController
{
    /** @var IngresoRepository $ingresoRepository*/
    private $ingresoRepository;

    public function __construct(IngresoRepository $ingresoRepo)
    {
        $this->ingresoRepository = $ingresoRepo;
    }

    /**
     * Display a listing of the Ingreso.
     *
     * @param IngresoDataTable $ingresoDataTable
     *
     * @return Response
     */
    public function index(IngresoDataTable $ingresoDataTable)
    {
        return $ingresoDataTable->render('ingresos.index');
    }

    /**
     * Show the form for creating a new Ingreso.
     *
     * @return Response
     */
    public function create()
    {
        // Obtener todos los edificios
        $edificios = Edificio::pluck('edif_descripcion', 'edif_id');

        // Obtener pisos agrupados por edificio
        $pisosPorEdificio = Piso::all()->groupBy('edif_id')->map(function ($pisos) {
            return $pisos->pluck('piso_descripcion', 'piso_id')->toArray();
        });

        // Obtener sectores agrupados por piso
        $sectoresPorPiso = Sector::all()->groupBy('piso_id')->map(function ($sectores) {
            return $sectores->pluck('sect_descripcion', 'sect_id')->toArray();
        });

        // Obtener salas agrupados por sector
        $salasPorSector = Sala::all()->groupBy('sect_id')->map(function ($salas) {
            return $salas->pluck('sala_descripcion', 'sala_id')->toArray();
        });

        // Obtener la lista de proveedores para el selector
        $proveedores = Proveedor::pluck('prov_nombre', 'prov_id');

        // Pasar los datos a la vista 'ingresos.create'
        return view('ingresos.create', compact('proveedores', 'edificios', 'pisosPorEdificio', 'sectoresPorPiso', 'salasPorSector'));
    }

    /**
     * Store a newly created Ingreso in storage.
     *
     * @param CreateIngresoRequest $request
     *
     * @return Response
     */
    public function store(CreateIngresoRequest $request)
    {

        DB::beginTransaction();

        try {

            // 1. Crear o buscar el tipo (insensible a mayúsculas)
            $btipDescripcion = strtolower($request->btip_descripcion);
            $tipo = BienesTipo::whereRaw('LOWER(btip_descripcion) = ?', [$btipDescripcion])->first();

            if (!$tipo) {
                $tipo = BienesTipo::create([
                    'btip_descripcion' => $request->btip_descripcion,
                    'btip_detalle' => $request->btip_detalle ?? '',
                ]);
            }

            // 2. Crear o buscar el sub-tipo
            $subtipo = BienesSubTipo::where('btip_id', $tipo->btip_id)
                ->whereRaw('LOWER(bsti_descripcion) = ?', [strtolower($request->bsti_descripcion)])
                ->first();

            if (!$subtipo || $subtipo->bsti_costo != $request->idet_costo) {
                $subtipo = BienesSubTipo::create([
                    'btip_id' => $tipo->btip_id,
                    'bsti_descripcion' => $request->bsti_descripcion,
                    'bsti_detalle' => $request->bsti_detalle ?? '',
                    'bsti_costo' => $request->idet_costo,
                ]);
            }

            // 3. Crear el ingreso
            $ingreso = new Ingreso([
                'prov_id' => $request->prov_id,
                'usu_id' => Auth::id(),
                'ing_fecha_compra' => $request->ing_fecha_compra,
                'ing_costo_total' => $request->idet_cantidad * $request->idet_costo,
                'ing_estado' => 0,
            ]);
            $ingreso->save();

            // 4. Crear el detalle del ingreso
            $detalle = new IngresosDet([
                'ing_id' => $ingreso->ing_id,
                'bsti_id' => $subtipo->bsti_id,
                'idet_cantidad' => $request->idet_cantidad,
                'idet_estado' => 0,
            ]);
            $detalle->save();

            // 5. Crear los bienes
            for ($i = 1; $i <= $detalle->idet_cantidad; $i++) {
                $bien = Bien::create([
                    'bsti_id' => $subtipo->bsti_id,
                    'sala_id' => $request->sala_id,
                    'idet_id' => $detalle->idet_id,
                    'bien_estado' => 0,
                ]);
                $bien->update(['bien_codigo' => "{$detalle->bsti_id}-{$detalle->idet_id}-{$bien->bien_id}"]);
            }

            DB::commit();

            Flash::success('Ingreso procesado exitosamente.');

            return redirect()->route('ingresos.index');
        } catch (\Exception $e) {
            DB::rollBack();

            Flash::error('Error al procesar el ingreso: ' . $e->getMessage());

            return redirect()->route('ingresos.create');
        }
    }


    /**
     * Display the specified Ingreso.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        // Cargar el ingreso junto con los detalles de ingreso (IngresosDet) y los bienes relacionados
        $ingreso = Ingreso::with(['ingresosDet.bien'])->findOrFail($id);

        // Retornar la vista con el ingreso y los bienes
        return view('ingresos.show', compact('ingreso'));
    }

    public function gestionEstados($ingresoId)
    {
        $ingreso = Ingreso::with(['ingresosDet.bien.sala'])->findOrFail($ingresoId);

        return view('ingresos.gestion_estados', compact('ingreso'));
    }


    public function actualizarEstados(Request $request, $ingresoId)
    {
        $ingreso = Ingreso::with(['ingresosDet.bien'])->findOrFail($ingresoId);

        DB::beginTransaction();

        try {
            // 1. Actualizar estados de los bienes
            $todosProcesados = true;  // Flag para verificar si todos los bienes están procesados
            $algunoPendiente = false; // Flag para verificar si hay algún bien pendiente

            foreach ($request->bienes as $bienId => $estado) {
                $bien = Bien::findOrFail($bienId);

                // Solo actualiza si el estado es diferente
                if ($bien->bien_estado != $estado) {
                    $bien->update(['bien_estado' => $estado]);
                }

                // Verificar los estados de los bienes después de la actualización
                if ($estado == 0) {
                    $algunoPendiente = true;  // Si hay algún bien en pendiente
                } elseif ($bien->bien_estado != 1 && $bien->bien_estado <= 1) {
                    $todosProcesados = false; // Si el bien no está procesado (estado 1 o superior)
                }
            }

            // 2. Verificar el estado de los bienes y actualizar los estados de ingreso y detalle
            if ($todosProcesados && !$algunoPendiente) {
                // Si todos los bienes están procesados, marcar el ingreso y detalles como procesados
                $ingreso->update(['ing_estado' => 1]);

                foreach ($ingreso->ingresosDet as $detalle) {
                    $detalle->update(['idet_estado' => 1]);
                }
            } else {
                // Si algún bien está pendiente, mantener el estado de ingreso y detalles en pendiente
                $ingreso->update(['ing_estado' => 0]);

                foreach ($ingreso->ingresosDet as $detalle) {
                    $detalle->update(['idet_estado' => 0]);
                }
            }

            DB::commit();

            Flash::success('Estados actualizados correctamente.');

            return redirect()->route('ingresos.show', $ingreso->ing_id);
        } catch (\Exception $e) {
            DB::rollBack();

            Flash::error('Error al actualizar estados: ' . $e->getMessage());

            return redirect()->route('ingresos.show', $ingreso->ing_id);
        }
    }





    /**
     * Show the form for editing the specified Ingreso.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        // Cargar el ingreso y sus relaciones necesarias
        $ingreso = Ingreso::with([
            'proveedor',
            'usu',
            'IngresosDet.bsti.tipo',
            'IngresosDet.bien.sala.sector.piso.edif'
        ])->findOrFail($id);

        // Obtener datos para los selects dinámicos
        $edificios = Edificio::pluck('edif_descripcion', 'edif_id');
        $pisosPorEdificio = Piso::all()->groupBy('edif_id')->map(function ($pisos) {
            return $pisos->pluck('piso_descripcion', 'piso_id')->toArray();
        });
        $sectoresPorPiso = Sector::all()->groupBy('piso_id')->map(function ($sectores) {
            return $sectores->pluck('sect_descripcion', 'sect_id')->toArray();
        });
        $salasPorSector = Sala::all()->groupBy('sect_id')->map(function ($salas) {
            return $salas->pluck('sala_descripcion', 'sala_id')->toArray();
        });

        $proveedores = Proveedor::pluck('prov_nombre', 'prov_id');

        // Obtener el primer detalle de ingreso
        $detalle = $ingreso->IngresosDet->first();

        // Seleccionar una ubicación representativa desde el primer bien
        $bienRepresentativo = $detalle?->bien->first(); // Obtener el primer bien
        $salaSeleccionada = $bienRepresentativo?->sala;
        $sectorSeleccionado = $salaSeleccionada?->sector;
        $pisoSeleccionado = $sectorSeleccionado?->piso;
        $edificioSeleccionado = $pisoSeleccionado?->edif;

        return view('ingresos.edit', compact(
            'ingreso',
            'proveedores',
            'edificios',
            'pisosPorEdificio',
            'sectoresPorPiso',
            'salasPorSector',
            'salaSeleccionada',
            'sectorSeleccionado',
            'pisoSeleccionado',
            'edificioSeleccionado'
        ));
    }

    /**
     * Update the specified Ingreso in storage.
     *
     * @param int $id
     * @param UpdateIngresoRequest $request
     *
     * @return Response
     */
    public function update(UpdateIngresoRequest $request, $id)
    {

        DB::beginTransaction();

        try {
            // Obtener el ingreso existente
            $ingreso = Ingreso::with('IngresosDet.bien')->findOrFail($id);

            // Obtener el detalle del ingreso existente
            $detalle = $ingreso->IngresosDet->first();

            // 1. Actualizar el tipo y subtipo si es necesario
            $btipDescripcion = strtolower($request->btip_descripcion);
            $tipo = BienesTipo::whereRaw('LOWER(btip_descripcion) = ?', [$btipDescripcion])->first();

            if (!$tipo) {
                $tipo = BienesTipo::create([
                    'btip_descripcion' => $request->btip_descripcion,
                    'btip_detalle' => $request->btip_detalle ?? '',
                ]);
            }

            $subtipo = BienesSubTipo::where('btip_id', $tipo->btip_id)
                ->whereRaw('LOWER(bsti_descripcion) = ?', [strtolower($request->bsti_descripcion)])
                ->first();

            if (!$subtipo || $subtipo->bsti_costo != $request->idet_costo) {
                if ($subtipo) {
                    $subtipo->update(['bsti_costo' => $request->idet_costo]);
                } else {
                    $subtipo = BienesSubTipo::create([
                        'btip_id' => $tipo->btip_id,
                        'bsti_descripcion' => $request->bsti_descripcion,
                        'bsti_detalle' => $request->bsti_detalle ?? '',
                        'bsti_costo' => $request->idet_costo,
                    ]);
                }
            }

            // 2. Actualizar el ingreso
            $ingreso->update([
                'prov_id' => $request->prov_id,
                'usu_id' => Auth::id(), // para cambiar el responsable si lo modificó otra persona
                'ing_fecha_compra' => $request->ing_fecha_compra,
                'ing_costo_total' => $request->idet_cantidad * $request->idet_costo,
            ]);

            // 3. Actualizar el detalle del ingreso
            $cantidadAnterior = $detalle->idet_cantidad;
            $detalle->update([
                'idet_cantidad' => $request->idet_cantidad,
                'idet_estado' => 0,
            ]);

            // 4. Gestionar los bienes
            $diferencia = $request->idet_cantidad - $cantidadAnterior;

            if ($diferencia > 0) {
                // Si aumenta la cantidad, crear bienes adicionales
                for ($i = 0; $i < $diferencia; $i++) {
                    $bien = Bien::create([
                        'bsti_id' => $subtipo->bsti_id,
                        'sala_id' => $request->sala_id,
                        'idet_id' => $detalle->idet_id,
                        'bien_estado' => 0,
                    ]);
                    $bien->update(['bien_codigo' => "{$detalle->bsti_id}-{$detalle->idet_id}-{$bien->bien_id}"]);
                }
            } elseif ($diferencia < 0) {
                // Si disminuye la cantidad, eliminar bienes excedentes
                $bienesEliminar = $detalle->bien->take(abs($diferencia));
                foreach ($bienesEliminar as $bien) {
                    $bien->delete();
                }
            }

            // 5. Actualizar todos los bienes con la nueva sala, si es necesario
            foreach ($detalle->bien as $bien) {
                if ($bien->sala_id != $request->sala_id) {
                    $bien->update(['sala_id' => $request->sala_id]);
                }
            }

            DB::commit();

            Flash::success('Ingreso actualizado exitosamente.');

            return redirect()->route('ingresos.index');
        } catch (\Exception $e) {
            DB::rollBack();

            Flash::error('Error al actualizar el ingreso: ' . $e->getMessage());

            return redirect()->route('ingresos.edit', $id);
        }
    }



    /**
     * Remove the specified Ingreso from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            // 1. Buscar el ingreso
            $ingreso = Ingreso::findOrFail($id);

            // Verificar si el ingreso puede ser eliminado 
            if ($ingreso->ing_estado != 0) { // solo ingresos pendientes pueden eliminarse
                Flash::error('No se puede eliminar un ingreso procesado.');
                return redirect()->route('ingresos.index')
                    ->with('error', 'No se puede eliminar un ingreso procesado.');
            }

            // 2. Eliminar los bienes asociados
            $bienes = Bien::whereIn('idet_id', $ingreso->ingresosDet->pluck('idet_id'))->get();
            foreach ($bienes as $bien) {
                $bien->delete();
            }

            // 3. Eliminar los detalles del ingreso
            foreach ($ingreso->ingresosDet as $detalle) {
                $detalle->delete();
            }

            // 4. Eliminar el ingreso
            $ingreso->delete();

            DB::commit();

            Flash::success('Ingreso eliminado exitosamente.');

            return redirect()->route('ingresos.index');
        } catch (\Exception $e) {
            DB::rollBack();

            Flash::error('Error al eliminar el ingreso: ' . $e->getMessage());

            return redirect()->route('ingresos.index');
        }
    }
}
