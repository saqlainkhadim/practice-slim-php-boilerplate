<?php
namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class WelcomeController
{
    public static function  index (Request $request, Response $response){
        $response->getBody()->write("Boring Slim framework");
        return $response;
    }
}