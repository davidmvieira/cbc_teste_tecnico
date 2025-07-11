<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsumoController extends Controller
{
    public function consumir(ConsumoRequest $request)
    {
        
        try {
            $clube = Clube::find($request->input('clube_id'));
            $recursos = Consumo::find($request->input('recursos_id'));
            $consumo_previsto = str_replace(['.', ','], ['', '.'], $request->valor_consumo);

            if( $clube->saldo_disponivel < $consumo_previsto) {
                return response()->json(['error' => 'O saldo disponível do clube é insuficiente.'], 400);
            }

            $saldo_anterior = $clube->saldo_disponivel;
            $clube->saldo_disponivel -= $consumo_previsto;
            $recursos->saldo_disponivel -= $consumo_previsto;

            $clube->save();
            $recursos->save();

            return response()->json([
                'clube' => $clube->clube,
                'saldo_anterior' => number_format($saldo_anterior, 2, ',', '.'),
                'novo_saldo' => number_format($clube->saldo_disponivel, 2, ',', '.'),
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao realizar consumo: ' . $e->getMessage()], 500);
        }
    }
}
