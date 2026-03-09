<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Disciplina extends Model
{
    use HasFactory;

    protected $table = 'disciplinas'; // 👈 adicione esta linha
    protected $fillable = ['nome'];
}