<?php

namespace App\Http;

use Exception;
use Throwable;
use PDOException;


class ErrorHandler
{
    public static function handle(Throwable $exception, Response $response = null)
    {
        $pdo_erros = require_once __DIR__ . '/../Core/Errors/PDOErros.php';
        
        if ($response === null) {
            $response = new Response();
        }

        $statusCode = $exception->getCode();
        $message = $exception->getMessage();

        if ($statusCode === 1000) {
            $response::view("erros/not_found", [
                "error" => $message
            ]);
            exit;
        }

        if ($exception instanceof PDOException) {
            // Lidar especificamente com exceções do PDO
            $code = 500; // Ou outro código de erro interno do servidor
            $message = $pdo_erros[$exception->getCode()] ?? $message;
        } elseif ($exception instanceof Exception) {
            // Se for uma instância de Exception padrão
            $code = $exception->getCode();
        } else {
            // Lidar com outros tipos de exceção aqui
        }

        http_response_code($code);

        $response::json([
            'message' => $message,
            'status' => $statusCode,
            'exception' => get_class($exception),
            'default' => $exception->getMessage(),
        ], $code);
    }
}
