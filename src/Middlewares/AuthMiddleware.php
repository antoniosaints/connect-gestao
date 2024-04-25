<?php
namespace App\Middlewares;

use App\Http\Request;
use App\Http\Response;

class AuthMiddleware {
    public function handle(Request $request, Response $response) {
        // Verificar se o usuário está autenticado
        if (!isset($_SESSION['token'])) {
            // Usuário não está autenticado, redirecionar para a página de login
            $response::view('erros/not_autorized', [
                "title" => "Erro..",
                "message" => "Usuário não autenticado"
            ]);
            exit();
        }
    }
}
