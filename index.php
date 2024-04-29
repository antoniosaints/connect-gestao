<?php
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, PUT, OPTIONS");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    // header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding");
    exit(0);
}
define('APP_PATH', __DIR__);
define('APP_URL', '/api');

require_once APP_PATH . '/vendor/autoload.php';
require_once APP_PATH . '/src/Services/AuthService.php';
require_once APP_PATH . '/src/Routes/Api.php';
require_once APP_PATH . '/src/Routes/Web.php';

use App\Core\Core;
use App\Http\Route;
Core::dispatch(Route::routes());
