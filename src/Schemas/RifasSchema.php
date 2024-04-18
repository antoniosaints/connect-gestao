<?php

namespace App\Schemas;

class RifasSchema
{
    public static function createRifa()
    {
        return [
            "rifa"     => "required|string",
            "contato"    => "required|string",
            "objetivo"    => "required|string",
            "descricao"    => "required|string",
        ];
    }

    public static function updateRifa()
    {
        return [
            "id"       => "required|integer",
            "rifa"     => "string",
            "contato"    => "string",
            "objetivo"    => "string",
            "descricao"    => "string",
        ];
    }
}