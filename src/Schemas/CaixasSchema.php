<?php

namespace App\Schemas;

class CaixasSchema
{
    public static function NovaCaixa()
    {
        return [
            "caixa"     => "required|string",
            "observacao"    => "required|string"
        ];
    }
    public static function EditarCaixa()
    {
        return [
            "id"       => "required|integer",
            "caixa"     => "string",
            "observacao"    => "string"
        ];
    }
}