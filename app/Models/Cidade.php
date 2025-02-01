<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    /** @use HasFactory<\Database\Factories\CidadeFactory> */
    use HasFactory;

    protected $table = 'cidades';

    protected $fillable = ['nome'];

    public function medicos()
    {
        return $this->hasMany(Medico::class);
    }

}
