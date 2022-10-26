<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Handlers\Strategies\RequestHandler as StrategiesRequestHandler;
use Slim\Psr7\Response;


class SalidaMiddlewares
{

    public function __invoke(Request $request,RequestHandler $handler): Response
    {
        $response = $handler->handle($request);
        $mensaje = "Despues!";
        $respuesta = ["respuesta" => $mensaje];

        $response->getBody()->write(json_encode($respuesta,true));
        return $response;
    }

}

?>