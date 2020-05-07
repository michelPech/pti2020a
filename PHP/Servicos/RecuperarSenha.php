<?php
namespace Servicos;

class RecuperarSenha
{
    private $emailUsuario;
    
    // Construtor
    public function dadosRecuperacao($emailUsuario)
    {
        $this-> setEmailUsuario($emailUsuario);
    }
    
    // Metodos de atributo
    public function getEmailUsuario()
    {
        return $this->emailUsuario;
    }

    public function setEmailUsuario($emailUsuario)
    {
        $this->emailUsuario = $emailUsuario;
    }

    
    // Metodos
    public function recuperar($conection, $emailUsuario)
    {
        $query = 'SELECT `senha.usuario`
                  FORM usuario
                  WHERE email.usuario = `$emailUsuario`
                  ;';
        
        $acesso = mysqli_query($conection, $query);
        $result = mysqli_num_rows($acesso);
        
        if($result == 0)
        {
            $retorno = false;
        }
        else
        {
            $retorno = mysqli_free_result($result);
        }
        
    }   
    
}

