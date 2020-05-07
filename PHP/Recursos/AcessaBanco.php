<?php
namespace Recursos;

class AcessaBanco
{
   
    private $host;
    private $user;
    private $password;
    private $dataBase;
    
    // Construtor
    public function dadosAcesso($host, $user, $password, $dataBase) 
    {
        $this-> setHost($host);
        $this-> setUser($user);
        $this-> setPassword($password);
        $this-> setDataBase($dataBase);
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
    public function conectaBanco($host, $user, $password, $dataBase)
    {
        $conection = new \mysqli($host, $user, $password, $dataBase);
        
        if($conection->connect_error)
        {
            $retorno = false;
            return $retorno;
        }
        else
        {
            $retorno = true;
            return $retorno;
        }
    }
    
    public function fechaConexao($conection)
    {
        mysqli_close($conection);
    }
    
}

