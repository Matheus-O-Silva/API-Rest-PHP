<?php

require_once  '../vendor/autoload.php';

use App\Controllers\UsersController;

if ($_SERVER['REQUEST_URI']) {

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = explode( '/', $uri);

    array_shift($uri);

    if($uri[0] === 'api'){

        $controller = 'App\Controllers\\'.ucfirst($uri[1]).'Controller';

        $method = strtolower($_SERVER['REQUEST_METHOD']);

        array_shift($uri);
        array_shift($uri);

        try{

            $response = call_user_func_array(array(new $controller, $method), $uri);

            http_response_code(200);
            echo json_encode(array('status' => 'sucess', 'data' => $response));

        } catch (\Exception $e){

            http_response_code(404);
            echo json_encode(array('status' => 'error', 'data' => $e->getMessage()), JSON_UNESCAPED_UNICODE);
            exit;
        }
    }
}
