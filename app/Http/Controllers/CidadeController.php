<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;

class CidadeController extends Controller
{
    public function list(Request $request)
    {

        $cities = Cidade::when($request->nome, function ($query) use ($request) {
            return $query->where('nome', 'like', '%' . $request->nome . '%');
        })
        ->orderBy('nome', 'asc')
        ->get();

        return response()->json($cities);
    }

    public function listDoctors($id, Request $request){

        $city = Cidade::findOrFail($id);

        $doctors = $city->medicos;

        if ($request->nome) {
            $nomeFiltrado = str_ireplace(['dr ', 'dra '], '', $request->nome);
            $doctors = $doctors->filter(function ($medico) use ($nomeFiltrado) {
                return stripos($medico->nome, $nomeFiltrado) !== false; 
            });
        }

        $doctors = $doctors->sortBy('nome');

        return response()->json($doctors);

    }
}
