<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clube;
use App\Http\Requests\ClubeRequest;

class ClubeController extends Controller
{
    public function index()
    {
        $clubes = Clube::all();
        return response()->json($clubes);
    }

    public function store(ClubeRequest $request)
    {
        $data = $request->validated();

        try{
            $clube = Clube::create([
                'nome' => $data['clube'],
                'saldo_disponivel' => (float) str_replace(',', '.', $data['saldo_disponivel']),
            ]);
            return response()->json($clube, 200);

        } catch (\Exception $e) {

            return response()->json(['error' => 'Erro ao criar clube: ' . $e->getMessage()], 500);
        }
        
    }
}
