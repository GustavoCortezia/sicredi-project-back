<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    // Definir o nome da tabela (caso não seja plural de forma automática)
    protected $table = 'logs';

    // Campos que podem ser atribuídos em massa
    protected $fillable = [
        'datahora', 'acao', 'detalhes'
    ];

    // Definir o formato de data/hora
    protected $casts = [
        'datahora' => 'datetime',
    ];
}
