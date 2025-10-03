<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ganancia;
use App\Models\Pago;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request; // 👈 NECESITAS ESTE USE
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Exports\PagosExport; // 👈 NECESITAS ESTE USE
use Maatwebsite\Excel\Facades\Excel; // 👈 NECESITAS ESTE USE

class PagoController extends Controller
{
    /**
     * Método para listar todos los pagos y aplicar el filtro de estado.
     */
    public function index(Request $request) // 👈 MODIFICADO: ACEPTA Request para el filtro
    {
        $query = Pago::with('user')
            ->orderBy('fecha_hora', 'desc');

        // Aplicar filtro por estado si existe en la solicitud
        $estado = $request->get('estado');

        if ($estado !== null && in_array($estado, ['0', '1'])) {
            $query->where('estado', $estado);
        }

        $pagos = $query->get();

        return view('admin.gestion.pagos.index', compact('pagos'));
    }

    /**
     * Exporta las órdenes de pago a un archivo Excel.
     */
    public function exportExcel(Request $request)
    {
        // Obtener el parámetro de estado de la URL (si existe)
        $estado = $request->get('estado'); 

        // Generar y descargar el archivo Excel
        return Excel::download(new PagosExport($estado), 'ordenes_de_pago.xlsx');
    }
// ------------------- EL RESTO DEL CÓDIGO PERMANECE IGUAL -------------------
    public function show(Pago $pago)
    {
        $items = $pago->productos;
        if (is_string($items)) {
            $items = json_decode($items, true);
        }
        if (!is_array($items)) {
            $items = [];
        }
        return view('admin.gestion.pagos.show', compact('pago', 'items'));
    }

    public function toggleEstado(Pago $pago)
    {
        $newEstado = $pago->estado == 1 ? 0 : 1;
        $mensaje = '';

        try {
            DB::beginTransaction();

            $items = $pago->productos;
            if (is_string($items)) {
                $items = json_decode($items, true);
            }
            if (!is_array($items)) {
                $items = [];
            }

            // LÓGICA PARA MARCAR COMO COMPLETADO
            if ($pago->estado == 1 && $newEstado == 0) {
                if (!empty($items)) {
                    foreach ($items as $item) {
                        $product = Product::find($item['id'] ?? null);
                        if ($product) {
                            $quantity = $item['quantity'] ?? 0;
                            if ($product->stock < $quantity) {
                                DB::rollBack();
                                return redirect()->back()->with('error', "Stock insuficiente para '{$product->name}'.");
                            }
                            $product->stock -= $quantity;
                            $product->save();

                            Ganancia::create([
                                'id_products' => $product->id,
                                'cobro' => ($item['price'] ?? 0) * $quantity,
                                'fecha' => Carbon::now(),
                                'pago_id' => $pago->id, // <-- GUARDAMOS LA RELACIÓN
                            ]);
                        }
                    }
                }
                $mensaje = 'Orden completada. Stock y ganancias actualizados.';

            // LÓGICA PARA REVERTIR A PENDIENTE
            } else if ($pago->estado == 0 && $newEstado == 1) {
                if (!empty($items)) {
                    foreach ($items as $item) {
                        $product = Product::find($item['id'] ?? null);
                        if ($product) {
                            // 1. Devolvemos el stock al producto
                            $product->stock += $item['quantity'] ?? 0;
                            $product->save();
                        }
                    }
                }
                
                // 2. Eliminamos los registros de ganancia asociados a esta orden
                Ganancia::where('pago_id', $pago->id)->delete();

                $mensaje = 'Orden revertida a PENDIENTE. El stock y las ganancias han sido restaurados.';
            }

            $pago->update(['estado' => $newEstado]);

            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Error en toggleEstado para Pago ID {$pago->id}: " . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error crítico. Revisa el log para más detalles.');
        }

        return redirect()->back()->with('success', $mensaje);
    }
}