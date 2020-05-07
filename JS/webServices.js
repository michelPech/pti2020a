/*-------------------------------------------------------------------------------------------------------
Projeto : PTI2020A                           Cliente      : UNOPAR
Autor   : Michel Henrique Staub Pech         Data Criação : 30/04/2020
Módulo  : WebServices                        Função       : Serviços de comunicação com o backend
-------------------------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------------------------
---> Faz login no sistema validando usuario <---
-------------------------------------------------------------------------------------------------------*/
function logarSistema() {

    let st_email = window.document.getElementById('email')
    let st_senha = window.document.getElementById('senha')

    if (st_email.value != "" & st_senha.value != "") {       

        let dados = {
                     action : "logarSistema",
                     name   : st_email.value,
                     senha  : st_senha.value
        }
        
        fetch("../PHP/application.php", {
            method : "POST",
            body   : JSON.stringify(dados)
        }).then(function(response){
            console.log(response)
        })
    } 
}

/*-------------------------------------------------------------------------------------------------------
---> Recuperar senha do usuario <---
-------------------------------------------------------------------------------------------------------*/
function recuperarSenha() {
  
    let st_email = window.document.getElementById('email')

    if (st_email.value = ""){
        alert("Por favor, preencha o campo de email para recuperar sua senha.")
    }

    else{

        let dados = {
                     action : "recuperarSenha",
                     name   : st_email.value
        }

        fetch("../PHP/application.php", {
            method : "POST",
            body   : JSON.stringify(dados)
        }).then(function(response){
            console.log(response)
        })        

        alert("Um email com a senha foi enviado para o endereço informado.")        
    }
}

/*-------------------------------------------------------------------------------------------------------
---> Cadastra um novo usuario <---
-------------------------------------------------------------------------------------------------------*/
function cadastrarUsuario() {
    
    let nu_cpf        = window.document.getElementById("nuCPF")
    let st_nome       = window.document.getElementById("stNome")
    let nu_nascimento = window.document.getElementById("dtNascimento")
    let st_email      = window.document.getElementById("stEmail")
    let st_senha      = window.document.getElementById("stSenha")
    let st_confSenha  = window.document.getElementById("stConfSenha")
    let nu_contato    = window.document.getElementById("nuContato")
    let st_social     = window.document.getElementById("stSocial")
    let st_endereco   = window.document.getElementById("stEndereco")

    if (st_senha.value != st_confSenha.value){

        alert("As senhas estão diferentes. Verifique e tente novamente!")

    }

    else {

        let dados = {
                     action     : "cadastraUsuario",
                     cpf        : nu_cpf.value,
                     name       : st_nome.value,
                     nascimento : "",
                     email      : st_email.value,
                     senha      : st_senha.value,
                     contato    : nu_contato.value,
                     social     : st_social.value,
                     endereco   : st_endereco.value
        } 

        fetch("../PHP/application.php", {
            method : "POST",
            body   : JSON.stringify(dados)
        }).then(function(response){
            console.log(response)
        })
    }
}

/*-------------------------------------------------------------------------------------------------------
---> Desativar um usuario <---
-------------------------------------------------------------------------------------------------------*/ 
function excluiUsuario(){

    let nu_cpf = window.document.getElementById("cpfUsuario")

    let dados = {
                 action : "deletaUsuario",
                 cpf    : nu_cpf.value
    }

    fetch("../PHP/application.php", {
        method : "POST",
        body   : JSON.stringify(dados)
    }).then(function(response){
        console.log(response)
    })    
}

/*-------------------------------------------------------------------------------------------------------
---> Cadastra nova denuncia <---
-------------------------------------------------------------------------------------------------------*/
function cadastrarDenuncia(){
    let st_latitude    = window.document.getElementById("st_latitude")
    let st_longitude   = window.document.getElementById("st_longitude")
    let st_autor       = window.document.getElementById("st_autor")
    let st_intervencao = window.document.getElementById("st_intervencao")
    let st_foto1       = window.document.getElementById("st_foto1")
    let st_descricao   = window.document.getElementById("st_descricao")

    let dados ={
                action      : "cadastrarDenuncia",
                latitude    : st_latitude.value,
                longitude   : st_longitude.value,
                autor       : st_autor.value,
                intervencao : st_intervencao.value,
                foto        : st_foto1.value,
                descricao   : st_descricao.value
    }        

    fetch("../PHP/application.php", {
        method : "POST",
        body   : JSON.stringify(dados)
    }).then(function(response){
        console.log(response)
    })
}
