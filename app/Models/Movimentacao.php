<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    use HasFactory;

    protected $table = 'movimentacoes';

    protected $fillable = [
        'coop',
        'agencia',
        'conta',
        'nome',
        'documento',
        'codigo',
        'descricao',
        'debito',
        'credito',
        'data_hora',
    ];
}

