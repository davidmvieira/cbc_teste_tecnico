<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clube;
use App\Models\Recurso;
use App\Http\Requests\ConsumoRequest;
class ConsumoController extends Controller
{
    public function consumir(ConsumoRequest $request)
    {
        
        try {
            $clube = Clube::find($request->input('clube_id'));
            $recursos = Recurso::find($request->input('recurso_id'));
            $consumo_previsto = (float)str_replace(['.', ','], ['', '.'], $request->valor_consumo);
            $recurso_clube = (float)str_replace(['.', ','], ['', '.'],$clube->saldo_disponivel) ;            

            if( $recurso_clube < $consumo_previsto) {
                return response()->json(['error' => 'O saldo disponível do clube é insuficiente.'], 400);
            }

            $saldo_anterior = $clube->saldo_disponivel;
            $novo_saldo_clube = $recurso_clube - $consumo_previsto;
            $recurso_total =  $recursos->saldo_disponivel ;
            $recurso_final = $recurso_total - $consumo_previsto;

            $clube->update([
                'saldo_disponivel' => $novo_saldo_clube,
            ]);
            $recursos->update(
                ['saldo_disponivel' => $recurso_final]
            );

            return response()->json([
                'clube' => $clube->clube,
                'saldo_anterior' => $saldo_anterior,
                'novo_saldo' => $novo_saldo_clube,
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao realizar consumo: ' . $e->getMessage()], 500);
        }
    }
}
