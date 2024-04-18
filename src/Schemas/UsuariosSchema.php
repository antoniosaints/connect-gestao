<?php

namespace App\Schemas;

class UsuariosSchema
{
    public static function createUser()
    {
        return [
            "nome"     => "required|string",
            "email"    => "required|email",
            "senha"    => "required|password",
        ];
    }

    public static function updateUser()
    {
        return [
            "id"       => "required|integer",
            "nome"     => "string",
            "email"    => "email",
            "senha"    => "password",
        ];
    }
}