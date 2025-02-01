<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Paciente;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Paciente::create(['nome' => 'Pax 0', 'cpf' => '12345678910', 'celular' => '(11) 98765-4321']);
        Paciente::create(['nome' => 'Pax 1', 'cpf' => '32145678910', 'celular' => '(45) 12765-4321']);
    }
}
