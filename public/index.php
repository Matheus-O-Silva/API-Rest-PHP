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

        try{

            $response = call_user_func(array(new $controller, $method), $uri);

            echo json_encode(array('status' => 'success', 'data' => $response));

        } catch (\Exception $e){

            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}
