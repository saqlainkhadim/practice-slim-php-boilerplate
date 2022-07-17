<?php

use Jenssegers\Blade\Blade;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
//use DI\Bridge\Slim\Bridge as SlimAppFactory;
//use App\Http\Controllers\WelcomeController;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../config/db.php';

$app= AppFactory::create();


function view(Response $response,$template,$with=[]){
    $cache =__DIR__.'/../cache';
    $views =__DIR__.'/../resources/views';

    $blade=( new Blade($views,$cache))->make($template,$with);
    $response->getBody()->write($blade->render());
    return $response;
}


$app->addErrorMiddleware(true,true,true);

$app->get('/login',function (Request $request, Response $response, $parameters){
    return view($response,'auth-login');
});

$app->get('/register',function (Request $request, Response $response, $parameters){
    return view($response,'auth-register');
});

$app->get('/users',function (Request $request, Response $response, $parameters){
    $sql="Select * From users";
    try { $db = new db();
    $conn = $db->connect();

    $stmt = $conn->query($sql);
    $friends = $stmt->fetchAll( PDO::FETCH_OBJ);

    $db = null; $response->getBody()->write(json_encode($friends));
    return $response ->withHeader('content-type', 'application/j son')
        ->withStatus(200);
    }
    catch (PDOException  $e) {
        $error = array(
            "message" => $e->getMessage()
        ) ;
    $response->getBody()->write(json_encode($error));
    return $response ->withHeader('content-type', 'application/j son') ->withStatus(500);
}

    return view($response,'auth-register');
});

$app->run();
