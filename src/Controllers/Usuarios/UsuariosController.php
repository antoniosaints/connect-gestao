<?php

namespace App\Controllers\Usuarios;

use App\Controllers\BaseController;
use App\Http\ErrorHandler;
use App\Http\Request;
use App\Http\Response;
use App\Models\Censo\UsuariosCensoModel;
use App\Models\UsuarioModel;
use App\Schemas\UsuariosSchema;
use App\Services\JwtService;
use Exception;

class UsuariosController extends BaseController
{

    public function __construct(private $UsuarioModel = new UsuarioModel, private $UsuarioModelCenso = new UsuariosCensoModel)
    {
    }
    public function Create(Request $request, Response $response)
    {
        try {
            $Post = $request::getPost();
            $dataValidada = self::validateSchema(UsuariosSchema::createUser(), $Post);
            $usuarioSave = $this->UsuarioModel->save($dataValidada);
            $response::json([ // Retorna os dados no formato JSON
                'message' => "Usuário criado com sucesso",
                'id'      => $usuarioSave
            ]);
        } catch (Exception $e) { // Tratamento de erro
            ErrorHandler::handle($e); // Chama o tratamento de erro
        }
    }

    public function getJson($_, Response $response)
    {

        try {
            $users = $this->UsuarioModelCenso
                ->select("id", "nome", "bairro", "datanasc")
                ->where([
                    "func_mes" => "s",
                    "status"   => "a"
                ])
                ->limit(10)
                ->find();
            $response::view("usuarios/lista_usuarios", [
                "users" => $users
            ]);
        } catch (Exception $e) {
            ErrorHandler::handle($e);
        }
    }

    public function editarUser(Request $req, Response $res)
    {
        try {
            $iduser = $req::getGet("id") || throw new Exception("ID não informado", 1000);

            $user = $this->UsuarioModelCenso->findById($iduser);
            $res::view("usuarios/form_usuarios", [
                "user" => $user
            ]);
        } catch (Exception $e) {
            ErrorHandler::handle($e);
        }
    }

    public function updateUser(Request $req, Response $res)
    {
        try {
            $iduser = $req::getGet("id");
            if (!$iduser) {
                throw new Exception("ID não informado");
            }
            $body = $req::getJson();
            $dataValidada = self::validateSchema(UsuariosSchema::updateUser(), $body);
            $userUpdated = $this->UsuarioModel->update($iduser, $dataValidada);
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
            $iduser = $req::getGet("id");
            if (!$iduser) {
                throw new Exception("ID não informado");
            }
            $userUpdated = $this->UsuarioModel->delete($iduser);
            $res::json([
                'message' => $userUpdated ? "Usuário excluido com sucesso" : "Nada foi excluido",
                'data'    => $userUpdated
            ]);
        } catch (Exception $e) {
            ErrorHandler::handle($e);
        }
    }
}
