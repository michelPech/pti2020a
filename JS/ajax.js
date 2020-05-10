/*-------------------------------------------------------------------------------------------------------
Projeto : PTI2020A                           Cliente      : UNOPAR
Autor   : Michel Henrique Staub Pech         Data Criação : 30/04/2020
Módulo  : Ajax                               Função       : Enviar dados ao back
-------------------------------------------------------------------------------------------------------*/
function enviaDados(st_dados)
{
    $.ajax({
            method  : "POST",
            url     : "../PHP/application.php",
            data    : st_dados,
            success : function(data)
            {
                alert(data)
            }
    })
}