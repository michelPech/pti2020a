<?php
namespace Recursos;

class AcessaBanco
{
   
    private $host;
    private $user;
    private $password;
    private $dataBase;
    
    // Construtor
    public function __construct()
    {
        
    }
    
    
    // Metodos de atributos
    public function getHost()
    {
        return $this->host;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getDataBase()
    {
        return $this->dataBase;
    }

    public function setHost($host)
    {
        $this->host = $host;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setDataBase($dataBase)
    {
        $this->dataBase = $dataBase;
    }
    
    // Metodos
    
    // 'Seta dados para acesso ao banco'
    public function dadosAcesso
    // ( Parametros )
    (
        $host, 
        $user, 
        $password, 
        $dataBase
    )
    // { Funcao }
    {
        $this-> setHost($host);
        $this-> setUser($user);
        $this-> setPassword($password);
        $this-> setDataBase($dataBase);
        
    }
    
    // 'Abre conexao com o banco de dados'
    public function conectaBanco
    // ( Parametros )
    (
        $host, 
        $user, 
        $password, 
        $dataBase
    )
    // { Funcao }
    {
        $conection = new \mysqli($host, $user, $password, $dataBase);
        
        if($conection->connect_error)
        {
            return false;
        }
        else
        {
            return $conection;
        }
    }
    
    // 'Fecha conexao com o banco'
    public function fechaConexao
    // ( Parametros )
    (
        $conection
    )
    // { Funcao }
    {
        mysqli_close($conection);
    }
    
}

