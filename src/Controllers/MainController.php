<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Models\CaixasModel;
use App\Models\UsuarioModel;
use App\Schemas\AuthSchema;
use App\Services\JwtService;
use AuthService;

class MainController extends BaseController
{
    public function __construct(
        protected $UsuarioModel = new UsuarioModel,
        protected $CaixasModel = new CaixasModel)
    {}
    public function index($_, Response $res)
    {
        $res::view("template/main");
    }

    public function login($_, Response $res, $message = null)
    {
        $res::view("template/login", [
            "error" => $message
        ]);
    }

    public function isMenu($_, Response $res)
    {
        $res::view("partials/menu");
    }

    public function auth(Request $req, Response $res)
    {
        $data = $req::getPost();
        $login = self::validateSchema(AuthSchema::loginSchema(), $data);
        $user = $this->UsuarioModel->where([
            "email" => $login["email"],
            "senha" => $login["senha"]
        ])->find();
        if (empty($user[0])) {
            return $this->login($req, $res, "Usuário ou senha inválidos");
        }
        $token = JwtService::encode($user, "saintsmvc", 7200);
        AuthService::setSession("token", $token);
        AuthService::setSession("login", $login["email"]);
        AuthService::setSession("nome", $user[0]->nome);
        $this->dashboard($req, $res);
    }

    public function logout($_, Response $res)
    {
        AuthService::destroySession();
        $this->login($_, $res);
    }


    public function dashboard($_, Response $res)
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
}
