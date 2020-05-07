<?php
namespace Servicos;

class Login
{
    private $emailUsuario;
    private $senha;
    
    // Construtor
    public function dadosLogin($emailUsuario, $senha)
    {
        $this-> setUsuario($emailUsuario);
        $this-> setSenha($senha);
    }
    
    // Metodos de atributos
    public function getEmailUsuario()
    {
        return $this->emailUsuario;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setEmailUsuario($emailUsuario)
    {
        $this->emailUsuario = $emailUsuario;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
    
    // Metodos
    public function loginBanco($conection, $emailUsuario, $senha)
    {
        $query = 'SELECT `idUsuario`
                  FROM `usuario`
                  WHERE `email.usuario` = $emailUsuario
                  AND `senha.usuario` = $senha
                  ;';
        
        
        $acesso = mysqli_query($conection, $query);
        $result = mysqli_num_rows($acesso);
        
        if($result == 0)
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
    
}

