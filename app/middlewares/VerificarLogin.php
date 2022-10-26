<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;

class VerificarLogin extends Usuario
{
    public function __invoke(Request $request,RequestHandler $handler):Response
    {   
        $parametros = $request->getParsedBody();

        $usr = Usuario::obtenerUsuario($parametros['nombre']);

        if( password_verify($parametros['clave'],$usr->clave))
        {
            $response = new Response();
            $response->getBody()->write('Usuario correcto');
        }

        return $response;
    }
}


?>