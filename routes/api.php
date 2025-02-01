<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ConsultaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [LoginController::class, 'login']);

Route::get('/cidades', [CidadeController::class, 'list']);
Route::get('/cidades/{id_cidade}/medicos', [CidadeController::class, 'listDoctors']);

Route::get('/medicos', [MedicoController::class, 'list']);


Route::middleware('jwt.verify')->group(function () { 

    Route::get('/user', [LoginController::class, 'me']);
    Route::post('/logout', [LoginController::class, 'logout']);
    
    Route::post('/medicos', [MedicoController::class, 'create']);
    Route::post('/medicos/consulta', [MedicoController::class, 'appointment']);
    Route::get('/medicos/{id_medico}/pacientes', [MedicoController::class, 'doctorPatients']);

    Route::post('/pacientes', [PacienteController::class, 'create']);
    Route::put('/pacientes/{id_paciente}', [PacienteController::class, 'update']);

});
