<?php
namespace App\Controllers\Lojas;

use App\Controllers\BaseController;
use App\Http\Response;

class Listagens extends BaseController
{
    public function index($_, Response $res)
    {
        $res::view('lojas/lista_lojas');
    }
}