<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Consulta;

class ConsultaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Consulta::create(['data' => '2025-01-31 16:48:09', 'medico_id' => 1, 'paciente_id' => 1]);
        Consulta::create(['data' => '2025-01-31 16:48:09', 'medico_id' => 2, 'paciente_id' => 2]);
    }
}
