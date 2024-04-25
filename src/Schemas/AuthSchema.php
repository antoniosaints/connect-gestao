<?php

namespace App\Schemas;

class AuthSchema
{
    public static function loginSchema()
    {
        return [
            "email"     => "required|string",
            "senha"    => "required|string"
        ];
    }
}