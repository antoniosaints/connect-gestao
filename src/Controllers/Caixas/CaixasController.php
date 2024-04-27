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
            $Post["caixa"] = trim($Post["caixa"]);
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

    public function GetFormPortas(Request $req, Response $res)
    {   
        $id = $req::getGet("id");
        $res::html("<input hx-post='".APP_URL."/caixas/tableline?id={$id}' hx-target='this' hx-swap='outerHTML' type='number' name='portas' class='bg-gray-800 w-[60px] rounded-lg' />");
    }

    public function tableline(Request $req, Response $res)
    {
        $id = $req::getGet("id");
        $portas = $req::getPost("portas");
        $caixa = $this->CaixasModel->where("id", $id)->find()[0];
        $this->CaixasModel->update($id, ["portas" => $portas]);
        $res::html('<div hx-get="'.APP_URL.'/caixas/portas?id='.$caixa["id"].'" hx-target="this" hx-swap="outerHTML" hx-trigger="click">'. $portas .'</div>');
    }

    public function ListaCaixas($r, Response $response)
    {
        try {
            if (isset($_GET["busca"])) {
                $this->CaixasModel->like("caixa", trim($_GET["busca"]));
            }

            $data = $this->CaixasModel
                ->select("id", "caixa", "status", "portas", "observacao")
                ->orderBy("caixa")
                ->find();
            $total = count($data);
            $perPage = 10;
            $page = 1;
            if (isset($_GET["page"])) {
                $page = $_GET["page"];
            }
            $offset = ($page - 1) * $perPage;
            $pages = ceil($total / $perPage);
            $dataResult = $this->CaixasModel
            ->limit($perPage, $offset)
            ->orderBy("status", "desc")
            ->find();

            $response::view("caixas/lista_caixas", [
                "caixas" => $dataResult,
                "total" => $total,
                "page" => $page,
                "pages" => $pages
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
