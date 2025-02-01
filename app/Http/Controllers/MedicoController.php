<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;
use App\Models\Consulta;
use App\Models\Paciente;

class MedicoController extends Controller
{

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'especialidade' => 'required|string|max:255',
            'cidade_id' => 'required|exists:cidades,id',
        ]);

        $medico = Medico::create($validatedData);

        return response()->json($medico, 201);
    }

    public function list(Request $request)
    {

        $doctors = Medico::when($request->nome, function ($query) use ($request) {

            $nomeFiltrado = str_ireplace(['dr ', 'dra '], '', $request->nome);
        
            return $query->where('nome', 'like', '%' . $nomeFiltrado . '%');
        })
        ->orderBy('nome', 'asc')
        ->get();

        return response()->json($doctors);

    }

    public function appointment(Request $request){

        $request = $request->validate([
            'medico_id' => ['required', 'exists:medicos,id'],
            'data' => ['required', 'date', 'date_format:Y-m-d H:i:s'],
            'paciente_id' => ['required', 'exists:pacientes,id'],
        ]);

        $appoint = Consulta::create($request);

        return response()->json($appoint);

    } 

    public function doctorPatients($id, Request $request)
    {
        $doctor = Medico::findOrFail($id);

        $paxQuery = Paciente::join('consultas', 'consultas.paciente_id', '=', 'pacientes.id')
            ->where('consultas.medico_id', $id)
            ->select('pacientes.*'); 

        if ($request->has('apenas-agendadas') && $request->input('apenas-agendadas') == 'true') {
            $paxQuery->where('consultas.data', '>', now());
        }

        $patients = $paxQuery->distinct()->get();
        
        return response()->json($patients);
    }

}
