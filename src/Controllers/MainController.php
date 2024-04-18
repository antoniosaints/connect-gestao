<?php
namespace App\Controllers;

use App\Http\Response;

class MainController extends BaseController
{
    public function index($_, Response $res)
    {
       
        $res::view("template/main");
    }
}