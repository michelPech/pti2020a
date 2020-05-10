<?php
namespace Entidades;

class Usuario
{
    private $idUsuario;
    private $cpfUsuario;
    private $nomeUsuario;
    private $nascimentoUsuario;
    private $emailUsuario;
    private $senhaUsuario;
    private $contatoUsuario;
    private $redeSocialUsuario;
    private $enderecoUsuario;
    
    // Construtor
    public function __construct()
    {
        
    }
    
    // Metodos de atributo
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }


    public function getCpfUsuario()
    {
        return $this->cpfUsuario;
    }


    public function getNomeUsuario()
    {
        return $this->nomeUsuario;
    }


    public function getNascimentoUsuario()
    {
        return $this->nascimentoUsuario;
    }


    public function getEmailUsuario()
    {
        return $this->emailUsuario;
    }

 
    public function getSenhaUsuario()
    {
        return $this->senhaUsuario;
    }


    public function getContatoUsuario()
    {
        return $this->contatoUsuario;
    }


    public function getRedeSocialUsuario()
    {
        return $this->redeSocialUsuario;
    }


    public function getEnderecoUsuario()
    {
        return $this->enderecoUsuario;
    }


    public function setCpfUsuario($cpfUsuario)
    {
        $this->cpfUsuario = $cpfUsuario;
    }

 
    public function setNomeUsuario($nomeUsuario)
    {
        $this->nomeUsuario = $nomeUsuario;
    }


    public function setNascimentoUsuario($nascimentoUsuario)
    {
        $this->nascimentoUsuario = $nascimentoUsuario;
    }


    public function setEmailUsuario($emailUsuario)
    {
        $this->emailUsuario = $emailUsuario;
    }


    public function setSenhaUsuario($senhaUsuario)
    {
        $this->senhaUsuario = $senhaUsuario;
    }


    public function setContatoUsuario($contatoUsuario)
    {
        $this->contatoUsuario = $contatoUsuario;
    }


    public function setRedeSocialUsuario($redeSocialUsuario)
    {
        $this->redeSocialUsuario = $redeSocialUsuario;
    }


    public function setEnderecoUsuario($enderecoUsuario)
    {
        $this->enderecoUsuario = $enderecoUsuario;
    }

    // Metodos
    
    // 'Set os dados de um usuario'
    public function dadosUsuario
    // ( Parametros )
    (
        $cpfUsuario, 
        $nomeUsuario, 
        $nascimentoUsuario,
        $emailUsuario, 
        $senhaUsuario, 
        $contatoUsuario,
        $redeSocialUsuario, 
        $enderecoUsuario
    )
    // { Funcao }
    {
        $this-> setCpfUsuario($cpfUsuario);
        $this-> setNomeUsuario($nomeUsuario);
        $this-> setNascimentoUsuario($nascimentoUsuario);
        $this-> setEmailUsuario($emailUsuario);
        $this-> setSenhaUsuario($senhaUsuario);
        $this-> setContatoUsuario($contatoUsuario);
        $this-> setRedeSocialUsuario($redeSocialUsuario);
        $this-> setEnderecoUsuario($enderecoUsuario);
    }
    
    // 'Verifica se os dados informados correspondem a um usuario cadastrado'
    public function logarSistema
    // ( Parametros )
    (
        $conection, 
        $emailUsuario, 
        $senha
    )
    // { Funcao }
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
    
    // 'Busca senha do usuario no banco para enviar por email'
    public function recuperarSenha
    // ( Parametros )
    (
        $conection, 
        $emailUsuario
    )
    // { Funcao }
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
            return $retorno;
        }
        else
        {
            $retorno = mysqli_free_result($result);
            return $retorno;
        }        
    }
    
    // 'Cadastra um novo usuario'
    public function cadastrarUsuario
    // ( Parametros )
    (
        $concetion, 
        $cpfUsuario, 
        $nomeUsuario, 
        $nascimentoUsuario,
        $emailUsuario, 
        $senhaUsuario, 
        $contatoUsuario,
        $redeSocialUsuario, 
        $enderecoUsuario
    )
    // { Funcao }
    {
        $query = 'INSERT INTO usuario
                  (cpf, nome, nascimento, email, senha, contato, redeSocial, endereco)
                  VALUES
                  (`$cpfUsuario`, `$nomeUsuario`, `$nascimentoUsuario`,
                   `$emailUsuario`, `$senhaUsuario`, `$contatoUsuario`,
                   `$redeSocialUsuario`, `$enderecoUsuario`)
                  ; ';
        
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
    
    // 'Atualiza os dados de um usuario'
    public function atualizarUsuario
    // ( Parametros )
    (
        $concetion, 
        $id, 
        $nomeUsuario, 
        $nascimentoUsuario, 
        $senhaUsuario, 
        $contatoUsuario, 
        $redeSocialUsuario, 
        $enderecoUsuario
    )
    // { Funcao }
    {
        $query = 'UPDATE usuario
                  SET nome.usuario     = `$nomeUsuario`
                  ,   senha.usuario    = `$senhaUsuario`
                  ,   contato.usuario  = `$contatoUsuario`
                  ,   social.usuario   = `$redeSocialUsuario`
                  ,   endereco.usuario = `$enderecoUsuario`
                  WHERE id.usuario = `$id`
                  ; ';
        
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
    
    
    // 'Consulta um usuario'
    public function consultaUsuario
    // ( Parametros )
    (
        $conection, 
        $id
    )
    // { Funcao }
    {
        $query = 'SELECT *
                  FROM usuario
                  WHERE id.usuario = `$id`
                  ; ';
        
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

