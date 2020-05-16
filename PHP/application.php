<?php
    
    // Carrega arquivos externos
    require_once 'Recursos/AcessaBanco.php';    
    require_once 'Entidades/denuncia.php';
    require_once 'Entidades/usuario.php';

    // Seta a variavel de controle
    $retorno = false;

    $acessaBanco = new Recursos\AcessaBanco();
    $conection = $acessaBanco->abrirConexao();

    // Recebe a acao a ser executada
    $action = $_POST['action'];      
    
    // Atualiza denuncias que passaram do prazo de 15 dias
    $updateDenuncias = new Entidades\Denuncia
    (
        "F", 
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        ""
    );
    
    $updateDenuncias->finalizaDenuncias($conection);

    // Faz login na tela principal
    if($action == 'logarSistema') 
    {
        // Dados do front
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        // Instancia objeto
        $usuario = new Entidades\Usuario
        (
            "",
            "",
            "",
            $email,
            $senha,
            "",
            "",
            ""
        );
        
        // Chama metodo do objeto
        $retorno = $usuario->logarSistema
        // ( Parametros )
        (
            $conection
        );
    }
    
    // Busca senha para enviar por email para o usuario
    if($action == 'recuperarSenha') 
    {        
        // Dados do front
        $email = $_POST['email'];
        
        // Instancia objeto
        $usuario = new Entidades\Usuario
        (
            "",
            "",
            "",
            $email,
            "",
            "",
            "",
            ""
        );
        
        // Chama metodo do objeto
        $retorno = $usuario->recuperarSenha
        // ( Parametros )
        (
            $conection
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
        $usuario = new Entidades\Usuario
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
        );
        
        // Chama metodo do objeto
        $retorno = $usuario->cadastrarUsuario
        // ( Parametros )
        (
            $conection
        );        
    }
    
    // Consulta o usuario logado para exibir na tela de cadastro
    if($action == 'consultarUsuario') 
    {
        // Dados do front
        $email = $_POST['email'];
        
        // Instancia objeto
        $usuario = new Entidades\Usuario
        // ( Parametros )
        (
            "",
            "",
            "",
            $email,
            "",
            "",
            "",
            ""
        );
        
        // Chama metodo do objeto
        $retorno = $usuario->consultarUsuario
        // ( Parametros )
        (
            $conection
        );
        
    }
    
    // Atualiza dados do usuario
    if($action == 'atualizarUsuario') 
    {
        // Dados do front
        $nome       = $_POST['nome'];
        $nascimento = $_POST['nascimento'];
        $email      = $_POST['email'];
        $senha      = $_POST['senha'];
        $contato    = $_POST['contato'];
        $social     = $_POST['social'];
        $endereco   = $_POST['endereco'];
        
        // Instancia objeto
        $usuario = new Entidades\Usuario
        // ( Parametros )
        (
            "",
            $nome,
            $nascimento,
            $email,
            $senha,
            $contato,
            $social,
            $endereco
        );
        
        // Chama metodo do objeto
        $retorno = $usuario->atualizarUsuario
        // ( Parametros )
        (
            $conection
        ); 
    }    
    
    // Cadastra uma nova denuncia
    if($action == 'cadastrarDenuncia') 
    {
        $emissao     = date('YYMD');

        // Dados do front
        $latitude    = $_POST['latitude'];
        $longitude   = $_POST['longitude'];
        $autor       = $_POST['autor'];
        $tipo        = $_POST['intervencao'];
        $foto        = $_POST['foto'];
        $descricao   = $_POST['descricao'];        

        // Instancia objeto
        $denuncia = new Entidades\Denuncia
        // ( Parametros )
        (
            "",
            "",
            $emissao,
            $longitude,
            $latitude,
            $autor,
            $tipo,
            $foto,
            "",
            $descricao
        );
        
        // Metodo do objeto
        $retorno = $denuncia->cadastrarDenuncia
        // ( Parametros )
        (
            $conection
        );
    }
    
    // Atualiza a denuncia
    if($action == 'atualizarDenuncia') 
    {
        // Dados do front
        $id     = $_POST['idDenuncia'];
        $foto2  = $_POST['foto2'];
        $status = $_POST['statusDenuncia'];
        
        // Instancia objeto
        $denuncia = new Etidades\Denuncia
        // ( Parametros )
        (
            $id,
            $status,
            "",
            "",
            "",
            "",
            "",
            "",
            $foto2,
            ""
        );

        // Metodo do objeto
        $retorno = $denuncia->atualizarDenuncia
        // ( Parametros )
        (
            $conection
        );
    }
    
    // Consulta denuncia para apresentar na tela
    if($action == 'consultarDenuncia') 
    {
        
        // Instancia objeto
        $denuncia = new Entidades\Denuncia
        // ( Parametros )
        (
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            ""
        );
        
        // Metodo do objeto
        $retorno = $denuncia->consultarDenuncia
        // ( Parametros )
        (
            $conection
        );
                
    }    

    $acessaBanco->fecharConexao($conection);
    
    echo json_encode($retorno);

    
    
    
    
    
    