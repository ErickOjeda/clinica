<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Medico;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Medico::create(['nome' => 'Carlos Silva', 'especialidade' => 'Cardiologista', 'cidade_id' => 1]);
        Medico::create(['nome' => 'Jefferson Santos', 'especialidade' => 'Ortopedista', 'cidade_id' => 2]);
    }
}
