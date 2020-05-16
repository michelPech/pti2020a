<?php
namespace Recursos;

class AcessaBanco
{
    // Construtor
    public function __construct()
    {}   
    
    public function abrirConexao()
    // { Funcao }
    {
        $conection = new \mysqli("localhost", "root", "", "pti2020a");
        
        if($conection->connect_error)
        {
            return false;
        }
        else
        {
            return $conection;
        }
    }

    public function fecharConexao
    // ( Parametros )
    (
        $conection
    )
    // { Funcao }
    {   
        mysqli_close($conection);
    }        
}

