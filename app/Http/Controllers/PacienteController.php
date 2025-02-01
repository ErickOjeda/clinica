<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class PacienteController extends Controller
{

    public function create(Request $request)
    {
        $data = $request->validate([
            'nome' => ['required', 'string'],
            'celular' => ['required', 'string', 'max:16'],
            'cpf' => ['required', 'string', 'max:15', 'unique:pacientes'],
        ]);

        $paciente = Paciente::create($data);

        return response()->json($paciente, 201);
    }

    public function update(Request $request, $id_paciente)
    {
        $paciente = Paciente::find($id_paciente);

        if (!$paciente) {
            return response()->json([
                'message' => 'Paciente não encontrado!'
            ], 404);
        }

        $data = $request->validate([
            'nome' => ['string'],
            'celular' => ['string', 'max:16'],	
        ]);

        $paciente->update($data);

        return response()->json($paciente);
    }
}
