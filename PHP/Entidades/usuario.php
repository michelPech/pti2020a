<?php
namespace Entidades;

class Usuario
{
    private $id;
    private $cpf;
    private $nome;
    private $nascimento;
    private $email;
    private $senha;
    private $contato;
    private $redeSocial;
    private $endereco;
    
    // Construtor
    public function __construct
    // ( Parametros )
    (
        $cpf,
        $nome,
        $nascimento,
        $email,
        $senha,
        $contato,
        $social,
        $endereco
    )
    // { Funcao }
    {
        $this-> setCpf($cpf);
        $this-> setNome($nome);
        $this-> setNascimento($nascimento);
        $this-> setEmail($email);
        $this-> setSenha($senha);
        $this-> setContato($contato);
        $this-> setSocial($social);
        $this-> setEndereco($endereco);
    }
    
    // Metodos de atributo
    public function getId()
    {
        return $this->id;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getNascimento()
    {
        return $this->nascimento;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function getContato()
    {
        return $this->contato;
    }

    public function getSocial()
    {
        return $this->redeSocial;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setNascimento($nascimento)
    {
        $this->nascimento = $nascimento;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function setContato($contato)
    {
        $this->contato = $contato;
    }

    public function setSocial($redeSocial)
    {
        $this->redeSocial = $redeSocial;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }
    

    // Metodos
    
    // 'Verifica se os dados informados correspondem a um usuario cadastrado'
    public function logarSistema
    // ( Parametros )
    (
        $conection
    )
    // { Funcao }
    {
        $controle = true;
        $email    = $this-> getEmail();
        $senha    = $this-> getSenha();        
        
        if ($email == "")
        {
            $controle = false;
            $retorno  =  "Informe o email para logar!";
        }        
        elseif ($senha == "")
        {
            $controle = false;
            $retorno  = "Senha incorreta!";
        }
        
        if ($controle == true)
        {
            $query = "SELECT email
                      FROM usuario
                      WHERE usuario.email = '$email'
                      AND usuario.senha = '$senha'
                      ;";
            
            
            $acesso = mysqli_query($conection, $query);
            if ($acesso == false)
            {
                $retorno = "ERRO";
            }
            else 
            {
                $result = mysqli_num_rows($acesso);
            
                if($result == 0)
                {
                    $retorno = "Usuario nao encontrado";
                }
                else
                {
                    $retorno = true;
                }                               
            }
                       
        }
        
        return $json = array('action' => "logarSistema",'ok' => $retorno);
    }
    
    // 'Busca senha do usuario no banco para enviar por email'
    public function recuperarSenha
    //  ( Parametros )
    (
        $conection
    )
    // { Funcao }
    {
        $controle = true;

        $email = $this-> getEmail();

        if($email == '')
        {
            $controle = false;
            $retorno  = "Informe um email para recuperar a senha";
        }

        if($controle == true)
        {
            $query = "SELECT senha
                      FROM usuario
                      WHERE usuario.email = '$email'
                      ;";
        
            $acesso = mysqli_query($conection, $query);
            if ($acesso == false)
            {
                $retorno = "ERRO";
            }
            else 
            {
                $result = mysqli_num_rows($acesso);
            
                if($result == 0)
                {
                    $retorno = "Usuario nao encontrado";
                }
                else
                {
                    $retorno = true;
                }                               
            }
                       
        }
        
        return $json = array('action' => "recuperarSenha", 'ok' => $retorno);        
    }
    
    // 'Cadastra um novo usuario'
    public function cadastrarUsuario
    // ( Parametros )
    (
        $conection
    )
    // { Funcao }
    {
        $controle   = true;        
        $cpf        = $this-> getCpf();
        $nome       = $this-> getNome();
        $nascimento = $this-> getNascimento();
        $email      = $this-> getEmail();
        $senha      = $this-> getSenha();
        $contato    = $this-> getContato();
        $social     = $this-> getSocial();
        $endereco   = $this-> getEndereco();
        
        if ($cpf == '')
        {
            $controle = false;
            return "Obrigatorio informar o CPF.";
        }

        if ($nome == '') 
        {
            $controle = false;
            return "Obrigatorio informar o nome.";
        }

        if ($nascimento == '')
        {
            $controle = false;
            return "Obrigatorio informar a data de nascimento.";
        }

        if ($email == '') 
        {
            $controle = false;
            return "Obrigatorio informar o E-mail.";
        }

        if ($senha == '')
        {
            $controle = false;
            return "Obrigatorio informar a senha.";
        }        

        if ($controle == true)
        {
            $query = "INSERT INTO usuario
                      (cpf, nome, nascimento, email, senha, contato, social, endereco)
                      VALUE
                      ('$cpf', '$nome', '$nascimento', '$email', '$senha', '$contato', '$social', '$endereco')
                      ;";
            
            $acesso = mysqli_query($conection, $query);

            if ($acesso == false)
            {
                $retorno = "ERRO";
            }
            else 
            {
                $retorno = true;
            }
                       
        }
        
        return $json = array('action' => "cadastrarUsuario", 'ok' => $retorno);
        
    }
    
    // 'Atualiza os dados de um usuario'
    public function atualizarUsuario
    //( Parametros )
    (
        $conection
    )
    // { Funcao }
    {   
        $nome     = $this-> getNome();
        $senha    = $this-> getSenha();
        $contato  = $this-> getContato();
        $social   = $this-> getSocial();
        $email    = $this-> getEmail(); 
        $endereco = $this-> getEndereco();       
    
        $query = "UPDATE usuario
                  SET usuario.nome     = '$nome'
                  ,   usuario.senha    = '$senha'
                  ,   usuario.contato  = '$contato'
                  ,   usuario.social   = '$social'
                  ,   usuario.endereco = '$endereco'
                  WHERE usuario.email = '$email'
                  ; ";
                          
        $acesso = mysqli_query($conection, $query);
        if ($acesso == false)
        {
            $retorno = "ERRO";
        }
        else
        {            
            $retorno = true;
        }

        return $json = array('action' => "atualizarUsuario", 'ok' => $retorno);
    }
    
    
    // 'Consulta um usuario'
    public function consultarUsuario
    //( Parametros )
    (
        $conection
    )
    // { Funcao }
    {
        $email = $this-> getEmail();

        if($email == '')
        {
            $query = "SELECT *
                      FROM usuario
                      ;";
        }
        else
        {
            $query = "SELECT *
                      FROM usuario
                      WHERE usuario.email = '$email'
                      ;";
        }   

        $acesso = mysqli_query($conection, $query);
        if ($acesso == false)
        {
            $json = array('action' => "consultarUsuario", 'ok' => "ERRO");
        }
        else 
        {
            while ($dados = mysqli_fetch_array($acesso))
            {
                $retCPF[]        = $dados['CPF'];
                $retNome[]       = $dados['Nome'];
                $retNascimento[] = $dados['Nascimento'];
                $retEmail[]      = $dados['email'];
                $retContato[]    = $dados['contato'];
                $retSocial[]     = $dados['social'];
                $retEndereco[]   = $dados['endereco'];
            }

            $json = array('action'     => "consultarUsuario", 
                          'ok'         => true,
                          'cpf'        => $retCPF,
                          'nome'       => $retNome,
                          'nascimento' => $retNascimento,
                          'email'      => $retEmail,
                          'contato'    => $retContato,
                          'social'     => $retSocial,
                          'endereco'   => $retEndereco);

            return $json;                                
        }                          
    }          
}

