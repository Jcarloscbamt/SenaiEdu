<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Professor extends Model
{
    use HasFactory;

    protected $table = 'professores';

    protected $fillable = ['nome', 'cpf', 'email', 'telefone', 'data_nascimento', 'cargo_id'];

    // Relacionamento: Um colaborador pertence a um cargo
    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }
}