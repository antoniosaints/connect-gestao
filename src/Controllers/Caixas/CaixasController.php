<?php

namespace App\Controllers\Caixas;

use App\Controllers\BaseController;
use App\Http\ErrorHandler;
use App\Http\Request;
use App\Http\Response;
use App\Models\CaixasModel;
use App\Schemas\CaixasSchema;
use App\Schemas\UsuariosSchema;
use Exception;

class CaixasController extends BaseController
{

    public function __construct(private $CaixasModel = new CaixasModel)
    {
    }
    public function Create(Request $request, Response $response)
    {
        try {
            $Post = $request::getPost();
            if ($Post["id"]) {
                $dataValidada = self::validateSchema(CaixasSchema::EditarCaixa(), $Post);
            }else {
                if (empty($this->CaixasModel->like("caixa", $Post["caixa"])->find()[0])) {
                    $dataValidada = self::validateSchema(CaixasSchema::NovaCaixa(), $Post);
                }else {
                    throw new Exception("Caixa já existe", 1000);
                }
            }
            $this->CaixasModel->save($dataValidada);
            $this->ListaCaixas($request, $response);
        } catch (Exception $e) { // Tratamento de erro
            ErrorHandler::handle($e); // Chama o tratamento de erro
        }
    }

    public function ListaCaixas($_, Response $response)
    {
        try {
            $data = $this->CaixasModel
                ->select("id", "caixa", "status", "portas", "observacao")
                ->orderBy("caixa")
                ->limit(50)
                ->find();
            $response::view("caixas/lista_caixas", [
                "caixas" => $data
            ]);
        } catch (Exception $e) {
            ErrorHandler::handle($e);
        }
    }

    public function EfetivarCaixa(Request $req, Response $res)
    {
        try {
            $id = $req::getGet("id");
            $to = $req::getGet("to");
            if (!$id) {
                throw new Exception("ID não informado");
            }
            $data = [
                "id" => $id,
                "portas" => 16,
                "status" => "concluido"
            ];
            $this->CaixasModel->save($data);
            if ($to == "caixas") {
                $this->ListaCaixas($req, $res);
            }else {
                $this->dashCaixas($req, $res);
            }
        } catch (Exception $e) {
            ErrorHandler::handle($e);
        }
    }

    public function dashCaixas(Request $req, Response $res)
    {
        $caixas = $this->CaixasModel->where([
            "status" => "pendente"
        ])
        ->orderBy("caixa")
        ->find();
        $res::view("partials/main", [
            "caixas" => $caixas
        ]);
    }

    public function detalheUser(Request $req, Response $res)
    {
        try {
            $id = $req::getGet("id");
            if (!$id) {
                throw new Exception("ID não informado");
            }
            $user = $this->CaixasModel->findById($id);
            $res::view("usuarios/detalhes_modal", [
                "user" => $user
            ]);
        } catch (Exception $e) {
            ErrorHandler::handle($e);
        }
    }

    public function FormCaixas(Request $req, Response $res)
    {
        try {
            $id = $req::getGet("id");

            if ($id) {
                $data = $this->CaixasModel->findById($id);
            }else {
                $data = [];
            }

            $res::view("caixas/form_caixas", [
                "caixa" => $data,
            ]);
        } catch (Exception $e) {
            ErrorHandler::handle($e);
        }
    }

    public function updateUser(Request $req, Response $res)
    {
        try {
            $id = $req::getGet("id");
            if (!$id) {
                throw new Exception("ID não informado");
            }
            $body = $req::getJson();
            $dataValidada = self::validateSchema(UsuariosSchema::updateUser(), $body);
            $userUpdated = $this->CaixasModel->update($id, $dataValidada);
            $res::json([
                'message' => $userUpdated ? "Usuário atualizado com sucesso" : "Nada foi alterado",
                'data'    => $userUpdated
            ]);
        } catch (Exception $e) {
            ErrorHandler::handle($e);
        }
    }

    public function Delete(Request $req, Response $res)
    {
        try {
            $id = $req::getGet("id");
            if (!$id) {
                throw new Exception("ID não informado");
            }
            $this->CaixasModel->delete($id);
            $this->ListaCaixas($req, $res);
        } catch (Exception $e) {
            ErrorHandler::handle($e);
        }
    }
}
