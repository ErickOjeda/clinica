<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    /** @use HasFactory<\Database\Factories\PacienteFactory> */
    use HasFactory;

    protected $table = 'pacientes';

    protected $fillable = ['nome', 'celular', 'cpf'];

    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }
}
