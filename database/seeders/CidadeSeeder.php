<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cidade;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cidade::create(['nome' => 'São Paulo', 'estado' => 'SP']);
        Cidade::create(['nome' => 'Rio de Janeiro', 'estado' => 'RJ']);
    }
}
