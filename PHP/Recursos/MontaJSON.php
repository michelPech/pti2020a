<?php
namespace Recursos;

class MontaJSON
{   
    private $tipoResposta;
    private $corpoResposta;

    public function __construct
    // ( Parametros )
    (
        $tipoResposta,
        $corpoResposta
    )
    // { Funcao }
    {
        $this-> setTipoResposta($tipoResposta);
        $this-> setCorpoResposta($corpoResposta);
    }
    
    public function setTipoResposta($tipoResposta)
    {
        $this->tipoResposta = $tipoResposta;
    }
    
    public function setCorpoResposta($corpoResposta)
    {
        $this->corpoResposta = $corpoResposta;
    }
        
    public function getTipoResposta()
    {
        return $this->tipoResposta;
    }
    
    public function getCorpoResposta()
    {
        return $this->corpoResposta;
    }   
    
    public function respostaJSON()
    {
        $tipoResposta = $this-> getTipoResposta();
        $corpoResposta = $this-> getCorpoResposta();
        
        
        return $json;
        
    }
}

