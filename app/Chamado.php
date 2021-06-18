<?php

namespace App;

use Facade\Ignition\Tabs\Tab;
use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    protected $table ='chamado';

    protected $fillable = [
        'titulo',
        'descricao',
        'categoria',
        'prioridade',
        'situacao',
        'imagem'
    ];

    protected $guarded =  [
        'situacao'
    ];
}
