/*-------------------------------------------------------------------------------------------------------
	Projeto : PTI2020A                           Cliente      : UNOPAR
	Autor   : Michel Henrique Staub Pech         Data Criação : 30/04/2020
	Módulo  : BackEnd                            Função       : aplicação de controle de ações no back
-------------------------------------------------------------------------------------------------------*/
<?php
    
    // Carrega arquivos externos
    require_once 'Recursos/AcessaBanco.php';
    require_once 'Entidades/denuncia.php';
    require_once 'Entidades/usuario.php';
    
    // Instancia objeto
    $acessaBanco = new Recursos\AcessaBanco();
    
    // Seta dados do objeto
    $dadosAcesso = $acessaBanco->dadosAcesso
    (
        'localhost', 
        'root', 
        '1234', 
        'pti2020a'
    );
    
    // Chama metodo do objeto
    $conection = $acessaBanco->conectaBanco
    (
        $acessaBanco->getHost(), 
        $acessaBanco->getUser(), 
        $acessaBanco->getPassword(), 
        $acessaBanco->getDataBase()
    );
    
    // Recebe a acao a ser executada
    $action = $_POST['action'];      
   
    // Atualiza todas as denuncias
    $denuncia = new Entidades\Denuncia();
    $denuncia->finalizaDenuncias();
    
    // Seta a variavel de controle
    $retorno = false;
    
    // Faz login na tela principal
    if($action == 'logarSistema') 
    {
        // Dados do front
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        // Instancia objeto
        $usuario = new Entidades\Usuario();
        
        // Chama metodo do objeto
        $retorno = $usuario->logarSistema
        // ( Parametros )
        (
            $conection,
            $email,
            $senha
        );
    }
    
    // Busca senha para enviar por email para o usuario
    if($action == 'recuperarSenha') 
    {        
        // Dados do front
        $email = $_POST['email'];
        
        // Instancia objeto
        $usuario = new Entidades\Usuario();
        
        // Chama metodo do objeto
        $retorno = $usuario->recuperarSenha
        // ( Parametros )
        (
            $conection,
            $email
        );
        
    }
    
    // Cadastra um novo usuario
    if($action == 'cadastrarUsuario') 
    {
        // Dados do front
        $cpf        = $_POST['cpf'];
        $nome       = $_POST['nome'];
        $nascimento = $_POST['nascimento'];
        $email      = $_POST['email'];
        $senha      = $_POST['senha'];
        $contato    = $_POST['contato'];
        $social     = $_POST['social'];
        $endereco   = $_POST['endereco'];
        
        // Instancia objeto
        $usuario = new Entidades\Usuario();
        
        // Chama metodo do objeto
        $retorno = $usuario->cadastrarUsuario
        // ( Parametros )
        (
            $conection,
            $cpf,
            $nome,
            $nascimento,
            $email,
            $senha,
            $contato,
            $social,
            $endereco
        );        
    }
    
    // Consulta o usuario logado para exibir na tela de cadastro
    if($action == 'consultarUsuario') 
    {
        // Dados do front
        $email = $_POST['email'];
        
        // Instancia objeto
        $usuario = new Entidades\Usuario();
        
        // Chama metodo do objeto
        $retorno = $usuario->consultarUsuario
        // ( Parametros )
        (
            $conection,
            $email
        );
        
    }
    
    // Atualiza dados do usuario
    if($action == 'atualizarUsuario') 
    {
        // Dados do front
        $nome       = $_POST['nome'];
        $nascimento = $_POST['nascimento'];
        $senha      = $_POST['senha'];
        $contato    = $_POST['contato'];
        $social     = $_POST['social'];
        $endereco   = $_POST['endereco'];
        
        // Instancia objeto
        $usuario = new Entidades\Usuario();
        
        // Chama metodo do objeto
        $retorno = $usuario->atualizarUsuario
        // ( Parametros )
        (
            $conection,
            $nome,
            $nascimento,
            $senha,
            $contato,
            $social,
            $endereco
        ); 
    }    
    
    // Cadastra uma nova denuncia
    if($action == 'cadastrarDenuncia') 
    {
        // Dados do front
        $latitude    = $_POST['latitude'];
        $longitude   = $_POST['longitude'];
        $autor       = $_POST['autor'];
        $intervencao = $_POST['intervencao'];
        $foto        = $_POST['foto'];
        $descricao   = $_POST['descricao'];
        
        // Instancia objeto
        $denuncia = new Entidades\Denuncia();
        
        // Metodo do objeto
        $retorno = $denuncia->cadastrarDenuncia
        // ( Parametros )
        (
            $latitude,
            $longitude,
            $autor,
            $intervencao,
            $foto,
            $descricao
        );
    }
    
    // Atualiza a denuncia
    if($action == 'atualizarDenuncia') 
    {
        // Dados do front
        $idDenuncia = $_POST['idDenuncia'];
        $foto2      = $_POST['foto2'];
        $foto3      = $_POST['foto3'];
        $status     = $_POST['statusDenuncia'];
        
        // Instancia objeto
        $denuncia = new Etidades\Denuncia();

        // Metodo do objeto
        $retorno = $denuncia->atualizarDenuncia
        // ( Parametros )
        (
            $conection,
            $idDenuncia,
            $foto2,
            $foto3,
            $status
        );
    }
    
    // Consulta denuncia para apresentar na tela
    if($action == 'consultarDenuncia') 
    {
        
        // Dados do front
        $idDenuncia = ['idDenuncia']; 
        
        // Instancia objeto
        $denuncia = new Entidades\Denuncia();
        
        // Metodo do objeto
        $retorno = $denuncia->consultarDenuncia
        // ( Parametros )
        (
            $conection,
            $idDenuncia
        );
    }
    
    // Caso a aplicacao seja chamada com um parametro nao implementado retorna erro
    if($retorno == false) 
    {
        $retorno = 'Erro, metodo não implementado.';
    }
    
    // Envia retorno a interface
    var_dump($retorno);

    
    
    
    
    
    