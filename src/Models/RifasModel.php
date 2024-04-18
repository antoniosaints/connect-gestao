<?php
namespace App\Models;

use App\Core\Database\Model;

class RifasModel extends Model
{
    protected $table = 'rifas';
    protected $allowFields = [
        'rifa',
        'descricao',
        'resp',
        'objetivo',
        'atual',
        'contato',
        'observacao'
    ];
   
}