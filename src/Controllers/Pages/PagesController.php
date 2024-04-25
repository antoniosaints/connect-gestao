<?php
namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Http\ErrorHandler;
use App\Http\Request;
use App\Http\Response;
use App\Models\CaixasModel;
use Exception;

class PagesController extends BaseController
{

    public function __construct(private $CaixasModel = new CaixasModel){}
    public function caixas(Request $req, Response $res)
    {
        try {
            $id = $req::getGet("id");
            $caixa = $this->CaixasModel->findById($id);
            $res::view("pages/caixas", [
                "caixa" => $caixa
            ]);
        }catch (Exception $e) {
            ErrorHandler::handle($e);
        }
    }
}