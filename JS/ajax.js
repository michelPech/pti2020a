
function enviaDados(st_dados)
{
    $.ajax({
            method  : "POST",
            url     : "../PHP/application.php",
            data    : st_dados,
            success : function(data)
            {
            	 retornoApplication(data)  
            }
    })

}