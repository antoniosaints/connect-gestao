<?php
namespace App\Controllers\Rifas;

use App\Controllers\BaseController;
use App\Http\ErrorHandler;
use App\Http\Request;
use App\Http\Response;
use App\Models\RifasModel;
use App\Schemas\RifasSchema;
use Exception;

class RifasController extends BaseController
{
    public function __construct(protected $RifaModel = new RifasModel()){}
    public function index($_, Response $res)
    {
        try {
            $rifas = $this->RifaModel->limit(10)->find();
            $res::view('rifas/lista_rifas', [
                'rifas' => $rifas
            ]);
        }catch (Exception $e) {
            ErrorHandler::handle($e);
        }
    }

    public function save(Request $request, Response $response)
    {
        try {
            $rifa = $request::getPost();
            if ($rifa["id"]) {
                $dataValidated = self::validateSchema(RifasSchema::updateRifa(), $rifa);
            }else {
                $dataValidated = self::validateSchema(RifasSchema::createRifa(), $rifa);
            }
            $this->RifaModel->save($dataValidated);

            $this->index($request, $response);
        }catch (Exception $e) {
            ErrorHandler::handle($e);
        }
    }

    public function editarRifa(Request $req, Response $res)
    {
        try {
            $rifa = [];
            $idrifa = $req::getGet("id");
            if ($idrifa) {
                $rifa = $this->RifaModel->findById($idrifa);
            }
            $res::view('rifas/form_rifas', [
                'rifa' => $rifa
            ]);
        }catch (Exception $e) {
            ErrorHandler::handle($e);
        }
    }
}