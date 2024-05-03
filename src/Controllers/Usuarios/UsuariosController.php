<?php

namespace App\Controllers\Usuarios;

use App\Controllers\BaseController;
use App\Http\ErrorHandler;
use App\Http\Request;
use App\Http\Response;
use App\Models\UsuarioModel;
use App\Schemas\UsuariosSchema;
use Exception;

class UsuariosController extends BaseController
{

    public function __construct(private $UsuarioModel = new UsuarioModel)
    {
    }
    public function Create(Request $request, Response $response)
    {
        try {
            $Post = $request::getPost();
            if ($Post["id"]) {
                $dataValidada = self::validateSchema(UsuariosSchema::updateUser(), $Post);
            } else {
                $dataValidada = self::validateSchema(UsuariosSchema::createUser(), $Post);
            }
            $this->UsuarioModel->save($dataValidada);
            $this->listaUsers($request, $response);
        } catch (Exception $e) { // Tratamento de erro
            ErrorHandler::handle($e); // Chama o tratamento de erro
        }
    }

    public function listaUsers($_, Response $response)
    {
        try {
            $users = $this->UsuarioModel
                ->select("id", "nome", "email", "senha")
                ->limit(10)
                ->find();

            if (isset($_::getHeaders()['HX-Request'])) {
                $response::view("usuarios/lista_usuarios", [
                    "users" => $users
                ]);
            } else {
                $response::view("template/main");
            }
        } catch (Exception $e) {
            ErrorHandler::handle($e);
        }
    }

    public function detalheUser(Request $req, Response $res)
    {
        try {
            $id = $req::getGet("id");
            if (!$id) {
                throw new Exception("ID não informado");
            }
            $user = $this->UsuarioModel->findById($id);
            $res::view("usuarios/detalhes_modal", [
                "user" => $user
            ]);
        } catch (Exception $e) {
            ErrorHandler::handle($e);
        }
    }

    public function editarUser(Request $req, Response $res)
    {
        try {
            $id = $req::getGet("id");

            if ($id) {
                $user = $this->UsuarioModel->findById($id);
            } else {
                $user = [];
            }

            $res::view("usuarios/form_usuarios", [
                "user" => $user,
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
            $userUpdated = $this->UsuarioModel->update($id, $dataValidada);
            $res::json([
                'message' => $userUpdated ? "Usuário atualizado com sucesso" : "Nada foi alterado",
                'data'    => $userUpdated
            ]);
        } catch (Exception $e) {
            ErrorHandler::handle($e);
        }
    }

    public function deleteUser(Request $req, Response $res)
    {
        try {
            $id = $req::getGet("id");
            if (!$id) {
                throw new Exception("ID não informado");
            }
            $this->UsuarioModel->delete($id);
            $this->listaUsers($req, $res);
        } catch (Exception $e) {
            ErrorHandler::handle($e);
        }
    }
}
