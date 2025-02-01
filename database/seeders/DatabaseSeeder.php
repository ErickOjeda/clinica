<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Database\Seeders\PacienteSeeder;
use Database\Seeders\CidadeSeeder;
use Database\Seeders\MedicoSeeder;
use Database\Seeders\ConsultaSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Christian',
            'email' => 'christian.ramires@example.com',
            'password' => bcrypt('password'),
        ]);

        $this->call([
            PacienteSeeder::class,
            CidadeSeeder::class,
            MedicoSeeder::class,
            ConsultaSeeder::class,
        ]);
    }
}
