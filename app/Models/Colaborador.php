<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Colaborador extends Model
{
    use HasFactory;

    protected $table = 'colaboradors';

    protected $fillable = ['nome', 'email', 'telefone', 'cargo_id'];

    // Relacionamento: Um colaborador pertence a um cargo
    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }
}
