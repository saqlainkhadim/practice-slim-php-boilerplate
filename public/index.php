<?php

use Jenssegers\Blade\Blade;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__.'/../vendor/autoload.php';

$app= AppFactory::create();


function view(Response $response,$template,$with=[]){
    $cache =__DIR__.'../cache';
    $views =__DIR__.'../resources/views';

    $blade=( new Blade($views,$cache))->make($template,$with);
    $response->getBody()->write($blade->render());
    return $response;
}


$app->addErrorMiddleware(true,true,true);
$app->get('/',function (Request $request, Response $response, $parameters){
    $response->getBody()->write("Boring Slim framework");
    return $response;

});
$app->get('/home',function (Request $request, Response $response, $parameters){
    return view($response,'abc.abc');

});
$app->run();
