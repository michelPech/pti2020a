
function botoes(st_botao)
{
    if(st_botao == 'sair')
    {
        sessionStorage.clear()
        window.location.href = "../HTML/index.html"
    }

    if(st_botao == 'menu')
    {
        let st_email = sessionStorage.getItem('email')
    
        if(st_email == null)
        {
            alert('É preciso estar logado para acessar o menu.')
        }
        else
        {
            window.location.href = "../HTML/menu.html"
        }
    }

    if(st_botao == 'localizacao')
    {    
        if (navigator.geolocation)
        {
                
        navigator.geolocation.getCurrentPosition(showPosition,showError)
        }
        else
        {
            alert("Seu browser não suporta Geolocalização.")
        }

        function showPosition(position)
        {            
            window.document.getElementById("st_latitude").value = position.coords.latitude
            window.document.getElementById("st_longitude").value = position.coords.longitude
        }
        function showError(error)
        {
        switch(error.code)
            {
            case error.PERMISSION_DENIED:
            x.innerHTML="Usuário rejeitou a solicitação de Geolocalização."
            break;
            case error.POSITION_UNAVAILABLE:
            x.innerHTML="Localização indisponível."
            break;
            case error.TIMEOUT:
            x.innerHTML="A requisição expirou."
            break;
            case error.UNKNOWN_ERROR:
            x.innerHTML="Algum erro desconhecido aconteceu."
            break;
            }
        }
    }
}

function logarSistema() 
{

    let st_email = window.document.getElementById('email')
    let st_senha = window.document.getElementById('senha')
    let st_dados = 
    {
        action : "logarSistema",
        email  : st_email.value,
        senha  : st_senha.value
    }

    sessionStorage.setItem('email', st_email.value)

    enviaDados(st_dados)
}

function recuperarSenha() 
{
  
    let st_email = window.document.getElementById('email')
    let st_dados = 
    {
        action : "recuperarSenha",
        email   : st_email.value
    }

    sessionStorage.setItem('email', st_email.value)

    enviaDados(st_dados)
}

function cadastrarUsuario() 
{
    // Verifica se tem usuario logado
    let st_logado = sessionStorage.getItem('email')

    if(st_logado != null)
    {
        atualizarUsuario(st_logado)
    }
    else
    {

        let dm_controle = true
        
        let nu_cpf        = window.document.getElementById("nuCPF")
        let st_nome       = window.document.getElementById("stNome")
        let dt_nascimento = window.document.getElementById("dtNascimento")
        let st_email      = window.document.getElementById("stEmail")
        let st_senha      = window.document.getElementById("stSenha")
        let nu_contato    = window.document.getElementById("nuContato")
        let st_social     = window.document.getElementById("stSocial")
        let st_endereco   = window.document.getElementById("stEndereco")
        let st_dados = 
        {
            action     : "cadastrarUsuario",
            cpf        : nu_cpf.value,
            nome       : st_nome.value,
            nascimento : dt_nascimento.value,
            email      : st_email.value,
            senha      : st_senha.value,
            contato    : nu_contato.value,
            social     : st_social.value,
            endereco   : st_endereco.value
        } 

        // cpf
        if(nu_cpf.value.length != 11)
        {
            alert("O campo de CPF deve conter 11 numeros")
            dm_controle = false
        }

        // nome
        if(st_nome.value == '')
        {
            alert("O campo de nome é obrigatório")
            dm_controle = false
        }

        // email
        if(st_email.value == '')
        {
            alert("O campo de email é obrigatório")
            dm_controle = false
        }
        else
        {
            if(st_email.value.includes(" ") == true)
            {            
                dm_controle = false 
            }
            
            if(st_email.value.includes("@") == false)
            {
                dm_controle = false 
            }

            if(st_email.value.includes(".") == false)
            {
                dm_controle = false 
            }        

            if(dm_controle == false)
            {
                alert("Informe um email valido")
            }
        }

        // senha
        if(st_senha.value.length < 6)
        {
            alert("A senha deve ter no minimo 6 caracteres")
            dm_controle = false
        }
        
        if(dm_controle == true)
        {
            enviaDados(st_dados)
        }
    }       
}

function atualizarUsuario(st_emailSessao)
{
    let dm_controle = true
    
    let nu_cpfCadastro = sessionStorage.getItem('cpf')

    let nu_cpf        = window.document.getElementById("nuCPF")
    let st_nome       = window.document.getElementById("stNome")
    let dt_nascimento = window.document.getElementById("dtNascimento")
    let st_email      = window.document.getElementById("stEmail")
    let st_senha      = window.document.getElementById("stSenha")
    let nu_contato    = window.document.getElementById("nuContato")
    let st_social     = window.document.getElementById("stSocial")
    let st_endereco   = window.document.getElementById("stEndereco")
    let st_dados = 
    {
        action     : "atualizarUsuario",
        cpf        : nu_cpf.value,
        nome       : st_nome.value,
        nascimento : dt_nascimento.value,
        email      : st_emailSessao,
        senha      : st_senha.value,
        contato    : nu_contato.value,
        social     : st_social.value,
        endereco   : st_endereco.value
    } 
    
    // cpf
    if(nu_cpf.value != nu_cpfCadastro)
    {
        alert("O CPF nao pode ser alterado")
        dm_controle = false
    }

    // nome
    if(st_nome.value == '')
    {
        alert("O campo de nome é obrigatório")
        dm_controle = false
    }

    // email
    if(st_email.value != st_emailSessao)
    {
        alert("O email não pode ser alterado")
        dm_controle = false
    }

    // senha
    if(st_senha.value.length < 6)
    {
        alert("A senha deve ter no minimo 6 caracteres")
        dm_controle = false
    }
    
    if(dm_controle == true)
    {
        enviaDados(st_dados)
    }
    else
    {
        window.document.location.reload()
    }    
}

function consultarUsuario()
{
    let st_email = sessionStorage.getItem('email')

    if(st_email != null)
    {    
        let st_dados =
        {
            action : "consultarUsuario",
            email  : st_email
        }

        enviaDados(st_dados)
    }
}

function cadastrarDenuncia()
{
    let st_controle = true
    let st_email    = sessionStorage.getItem('email')
    
    let st_latitude    = window.document.getElementById("st_latitude")
    let st_longitude   = window.document.getElementById("st_longitude")
    let st_autor       = window.document.getElementById("st_autor")
    let st_intervencao = window.document.getElementById("st_intervencao")
    let st_foto1       = window.document.getElementById("st_foto1")
    let st_descricao   = window.document.getElementById("st_descricao")

    if(st_autor.value != st_email && st_autor.value != st_email)
    {
        alert("O autor deve ser você.")
        let st_controle = false
    }

    if(st_foto1 == '')
    {
        alert("Obrigatorio inserir uma foto do local")
        let st_controle = false
    }
    else
    {
        st_foto1.append('file', )
    }
    
    if(st_descricao.value == '')
    {
        alert("Insira uma descricao")
        let st_controle = false
    }

    if(st_controle == true)
    {
        let st_dados       =
        {
            action      : "cadastrarDenuncia",
            latitude    : st_latitude.value,
            longitude   : st_longitude.value,
            autor       : st_autor.value,
            intervencao : st_intervencao.value,
            foto        : st_foto1.value,
            descricao   : st_descricao.value
        }        
    console.log(st_dados)    
        enviaDados(st_dados)
    }
}

function atualizarDenuncia()
{
    let nu_idDenuncia = window.document.getElementById("nu_denuncia")
    let st_foto2      = window.document.getElementById("st_foto2")
    let st_status     = window.document.getElementById("st_status")
    let st_dados      = 
    {
        action      : "atualizarDenuncia",
        idDenuncia  : nu_idDenuncia.value,
        foto2       : st_foto2.value,
        status      : st_status
    }

    enviaDados(st_dados)
}

function consultarDenuncia()
{  
    let st_dados =
    {
        action     : "consultarDenuncia"
    }

    enviaDados(st_dados)
}

function retornoApplication(data)
{

    let st_retorno = JSON.parse(data)
    let st_action = st_retorno.action

    if(st_action == 'logarSistema')
    {
        let st_resposta = st_retorno.ok

        if(st_resposta != true)
        {            
            alert(st_resposta)
            sessionStorage.clear()
        }
        else
        {            
            window.location.href = "../HTML/menu.html"
        }
    }

    if(st_action == "recuperarSenha")
    {
        let st_resposta = st_retorno.ok

        if(st_resposta != true)
        {
            alert(st_resposta)
        }
        else
        {
            alert("Sua senha foi enviada por email")
        }
    }

    if(st_action == 'cadastrarUsuario')
    {
        let st_resposta = st_retorno.ok
        
        if(st_resposta != true)
        {
            alert(st_resposta)
        }
        else
        {
            alert("Usuario cadastrado com sucesso")
            window.location.href = "../HTML/index.html"
        }
    }

    if(st_action == 'atualizarUsuario')
    {
        let st_resposta = st_retorno.ok

        if(st_resposta != true)
        {
            alert(st_resposta)
        }
        else
        {
            alert("Dados atualizados com sucesso")
        }
    }

    if(st_action == 'consultarUsuario')
    {
        let st_resposta = st_retorno.ok

        if(st_resposta != true)
        {
            alert(st_resposta)
        }
        else
        {
            window.document.getElementById("nuCPF").value        = st_retorno.cpf
            window.document.getElementById("stNome").value       = st_retorno.nome
            window.document.getElementById("dtNascimento").value = st_retorno.nascimento
            window.document.getElementById("stEmail").value      = st_retorno.email
            window.document.getElementById("nuContato").value    = st_retorno.contato
            window.document.getElementById("stSocial").value     = st_retorno.social
            window.document.getElementById("stEndereco").value   = st_retorno.endereco

            sessionStorage.setItem('cpf', st_retorno.cpf)
        }
    }

    if(st_action == 'cadastrarDenuncia')
    {
        let st_resposta = st_retorno.ok

        if(st_resposta != true)
        {
            alert(st_resposta)
        }
        else
        {
            alert("Denuncia incluida com sucesso")
            window.location.href = "../HTML/consultaDenuncia.html"
        }
    }

    if(st_action == 'atualizarDenuncia')
    {
        let st_resposta = st_retorno.ok

        if(st_resposta != true)
        {
            alert(st_resposta)
        }
        else
        {
            alert("Denuncia atualizada com sucesso")
        }
    }

    if(st_action == 'consultarDenuncia')
    {
        let st_email = sessionStorage.getItem('email')
        sessionStorage.clear()
        sessionStorage.setItem('email', st_email)

        let st_resposta = st_retorno.ok

        if(st_resposta != true)
        {
            alert(st_resposta)
        }
        else
        {   
            console.log(data)     

            st_retorno.id.forEach(idDenuncia)                            
            function idDenuncia(idDenuncia, index)
            {
                sessionStorage.setItem('ID['+ index + ']', idDenuncia)  

                let divScroll = window.document.getElementById("denuncias")

                let lv_teste =                  
                    '<div class="card-group">' +
                        '<div class="card">' +
                            '<div class="card text-right text-white bg-dark">' +
                                '<div class="card-header">' +
                                    '<small class="card-title">NUMERO:</small>' +
                                '</div> ' +
                            '</div>' +
                        '</div>' +
                        '<div class="card">' +
                            '<div class="card text-left text-dark">' +
                                '<div class="card-header">' +
                                    '<small class="card-title">' + idDenuncia + '</small>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '</div>';
                
                divScroll.innerHTML = lv_teste
            }

            st_retorno.Status.forEach(status)
            function status(status, index)
            {
                sessionStorage.setItem('status['+ index + ']', status) 
            }               

            st_retorno.Latitude.forEach(latitude)
            function latitude(latitude, index)
            {
                sessionStorage.setItem('latitude['+ index + ']', latitude) 
            }

            st_retorno.Longitude.forEach(longitude)
            function longitude(longitude, index)
            {
                sessionStorage.setItem('longitude['+ index + ']', longitude) 
            } 
            
            st_retorno.Autor.forEach(autor)
            function autor(autor, index)
            {
                sessionStorage.setItem('autor['+ index + ']', autor) 
            }   
            
            st_retorno.Tipo.forEach(tipo)
            function tipo(tipo, index)
            {
                sessionStorage.setItem('tipo['+ index + ']', tipo) 
            }  
            
            st_retorno.Foto1.forEach(foto1)
            function foto1(foto1, index)
            {
                sessionStorage.setItem('foto1['+ index + ']', foto1) 
            }                
            
            st_retorno.Descricao.forEach(descricao)
            function descricao(descricao, index)
            {
                sessionStorage.setItem('descricao['+ index + ']', descricao) 
            }                        
        }
    }
}