<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cargo extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    // Relacionamento: Um cargo tem muitos colaboradores
    public function colaboradores()
    {
        return $this->hasMany(Colaborador::class);
    }
}
