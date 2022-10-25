<?php

class Pizza
{
    public $id;
    public $sabor;
    public $tipo;

    public function crearPizza()
    {
        $objAccesoDatos = AccesoDatos::obtenerInstancia("test");
        $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO Pizzas (sabor, tipo) VALUES (:sabor, :tipo)");
        
        $consulta->bindValue(':sabor', $this->sabor, PDO::PARAM_STR);
        $consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);
        $consulta->execute();

        return $objAccesoDatos->obtenerUltimoId();
    }

}

?>