<?php
namespace App\Models;

use App\Core\Database\Model;

class CaixasModel extends Model
{
    protected $table = 'caixas_atendimento';
    protected $allowFields = [
        'caixa',
        'portas',
        'observacao',
        'status'
    ];
   
}