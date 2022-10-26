<?php



class LoginController
{
    public function VerificarLogueo($request,$response,$args)
    {
        $datos = $request->getParsedBody();
        $usuarioDB = Usuario::obtenerUsuario($datos['usuario']);

        if(password_verify($datos['clave'],$usuarioDB->clave))
        {
            $payload = json_encode(array("mensaje"=>"usuario logueado"));
        }
        else
        {
            $payload = json_encode(array("mensaje"=>"Error login"));
        }
  
        $response->getBody()->write(json_encode($payload));
        return $response->withHeader('Content-Type', 'application/json');
    }
}


?>