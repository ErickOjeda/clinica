<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    /** @use HasFactory<\Database\Factories\MedicoFactory> */
    use HasFactory;

    protected $table = 'medicos';

    protected $fillable = ['nome', 'especialidade', 'cidade_id'];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

}
