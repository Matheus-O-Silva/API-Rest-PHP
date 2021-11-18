<?php

header("Access-Control-Allow-Origin: *");

header('Content-Type: application/json');

require_once  '../vendor/autoload.php';

use App\Controllers\UsersController;
use App\Controllers\AuthController;

if ($_SERVER['REQUEST_URI']) {

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = explode( '/', $uri);

    array_shift($uri);

    if($uri[0] === 'api'){

        $controller = 'App\Controllers\\'.ucfirst($uri[1]).'Controller';

        $method     = strtolower($uri[2]);

        $param      = ['param' => $uri[3]];

        try{
           

            $response = call_user_func_array(array(new $controller, $method), $param);

            http_response_code(200);
            echo json_encode(array('status' => 'success', 'data' => $response));

        } catch (\Exception $e){

            http_response_code(404);
            echo json_encode(array('status' => 'error', 'data' => $e->getMessage()), JSON_UNESCAPED_UNICODE);
            exit;
        }
    }
}
