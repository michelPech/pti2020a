<?php
    
    // Abre conex�o com o banco
    $conexaoBanco = new conectaBanco('localhost', '', '', 'pti2020a');
    
    // Atualiza todas as denuncias
    $updateDenuncia = new finalizaDenuncias();
    
    // Recebe o tipo de acao disparada na interface
    $action  = $_POST['action'];
    
    // Seta a variavel de controle
    $retorno = false;
    
    // Faz login na tela principal
    if($action == 'logarSistema') 
    {
        $retorno = new logarSistema();        
    }
    
    // Busca senha para enviar por email para o usuario
    if($action == 'recuperarSenha') 
    {
        $retorno = new recuperarSenha();
    }
    
    // Cadastra um novo usuario
    if($action == 'cadastraUsuario') 
    {
        $retorno = new cadastraUsuario();
    }
    
    // Consulta o usuario logado para exibir na tela de cadastro
    if($action == 'consultaUsuario') 
    {
        $retorno = new consultaUsuario();
    }
    
    // Atualiza dados do usuario
    if($action == 'atualizaUsuario') 
    {
        $retorno = new atualizaUsuario();
    }
    
    // Inativa usuario
    if($action == 'deletaUsuario') 
    {
        $retorno = new deletaUsuario();
    }
    
    // Cadastra uma nova denuncia
    if($action == 'cadastrarDenuncia') 
    {
        $retorno == new cadastrarDenuncia();
    }
    
    // Atualiza a denuncia
    if($action == 'atualizaDenuncia') 
    {
        $retorno = new atualizaDenuncia();
    }
    
    // Consulta denuncia para apresentar na tela
    if($action == 'consultaDenuncia') 
    {
        $retorno = new consultaDenuncia();
    }
    
    // Caso a aplicacao seja chamada com um parametro nao implementado retorna erro
    if($retorno == false) 
    {
        $retorno = 'Erro, metodo n�o implementado.';
    }
    
    // Envia retorno a interface
    return $retorno;
    
    
    
    
    
    
    
    
    
    
    