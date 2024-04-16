<?php
namespace App\Models\Censo;

use App\Core\Database\Model;

class UsuariosCensoModel extends Model
{
    protected $primary = "id";
    protected $dbGroup = "censo";
    protected $table = "usuarios";
    protected $allowFields = ["nome", "email", "senha", "ativo", "created_at", "updated_at"];
    
}