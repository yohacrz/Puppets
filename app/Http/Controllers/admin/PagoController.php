<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ganancia;
use App\Models\Pago;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Exports\PagosExport;
use Maatwebsite\Excel\Facades\Excel;

class PagoController extends Controller
{
    public function index(Request $request)
    {
        $query = Pago::with('user')->orderBy('fecha_hora', 'desc');
        $estado = $request->get('estado');

        if ($estado !== null && in_array($estado, ['0', '1'])) {
            $query->where('estado', $estado);
        }
        $pagos = $query->get();
        return view('admin.gestion.pagos.index', compact('pagos'));
    }

    public function exportExcel(Request $request)
    {
        $estado = $request->get('estado'); 
        return Excel::download(new PagosExport($estado), 'ordenes_de_pago.xlsx');
    }

    public function show(Pago $pago)
    {
        $items = $pago->productos;
        if (!is_array($items)) {
            $decodedItems = json_decode($items, true); 
            $items = is_array($decodedItems) ? $decodedItems : [];
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
            if (!is_array($items)) {
                $items = json_decode($items, true);
            }
            if (!is_array($items)) {
                $items = [];
            }

            // Columnas de stock
            $validSizeColumns = ['stock_S','stock_M','stock_L','stock_XL','stock_UNICA'];
            $sizeMap = [
                'S' => 'S',
                'M' => 'M',
                'L' => 'L',
                'XL' => 'XL',
                '5' => 'S',
                'TALLA 5' => 'S',
                'ÚNICA' => 'UNICA',
            ];

            // COMPLETAR ORDEN (1 -> 0)
            if ($pago->estado == 1 && $newEstado == 0) {
                if (!empty($items)) {
                    foreach ($items as $item) {
                        $product = Product::find($item['id'] ?? null);
                        $quantity = $item['quantity'] ?? 0;
                        if (!$product || $quantity <= 0) continue;

                        $rawSizeKey = $item['size'] ?? $item['talla'] ?? null;
                        $mappedSize = strtoupper(trim($sizeMap[strtoupper(trim($rawSizeKey))] ?? $rawSizeKey));
                        $sizeColumn = 'stock_' . $mappedSize;
                        $isSizeBasedProduct = in_array($sizeColumn, $validSizeColumns);

                        // Restar stock por talla si existe
                        if ($isSizeBasedProduct && isset($product->{$sizeColumn})) {
                            $currentStockTalla = (int)$product->{$sizeColumn};
                            if ($currentStockTalla < $quantity) {
                                DB::rollBack();
                                return redirect()->back()->with('error', "Stock insuficiente de talla {$mappedSize} para '{$product->name}'. Stock actual: {$currentStockTalla}");
                            }
                            $product->{$sizeColumn} = $currentStockTalla - $quantity;
                        }

                        // Siempre restar stock total
                        $product->stock = (int)$product->stock - $quantity;
                        $product->save();

                        // Registrar ganancia
                        Ganancia::create([
                            'id_products' => $product->id,
                            'cobro' => ($item['price'] ?? 0) * $quantity,
                            'fecha' => Carbon::now(),
                            'pago_id' => $pago->id,
                        ]);

                        Log::info("Stock restado: {$product->name}, talla {$mappedSize}, cantidad {$quantity}");
                    }
                }
                $mensaje = 'Orden completada. Inventario y ganancias actualizados.';

            // REVERTIR A PENDIENTE (0 -> 1)
            } else if ($pago->estado == 0 && $newEstado == 1) {
                if (!empty($items)) {
                    foreach ($items as $item) {
                        $product = Product::find($item['id'] ?? null);
                        $quantity = $item['quantity'] ?? 0;
                        if (!$product || $quantity <= 0) continue;

                        $rawSizeKey = $item['size'] ?? $item['talla'] ?? null;
                        $mappedSize = strtoupper(trim($sizeMap[strtoupper(trim($rawSizeKey))] ?? $rawSizeKey));
                        $sizeColumn = 'stock_' . $mappedSize;
                        $isSizeBasedProduct = in_array($sizeColumn, $validSizeColumns);

                        // Devolver stock por talla
                        if ($isSizeBasedProduct && isset($product->{$sizeColumn})) {
                            $product->{$sizeColumn} = (int)$product->{$sizeColumn} + $quantity;
                        }

                        // Siempre devolver stock total
                        $product->stock = (int)$product->stock + $quantity;
                        $product->save();
                    }
                }
                // Eliminar ganancias
                Ganancia::where('pago_id', $pago->id)->delete();
                $mensaje = 'Orden revertida a PENDIENTE. Inventario y ganancias restaurados.';
            }

            // Actualizar estado del pago
            $pago->update(['estado' => $newEstado]);
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Error toggleEstado Pago ID {$pago->id}: " . $e->getMessage());
            return redirect()->back()->with('error', 'Error crítico: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', $mensaje);
    }
}
