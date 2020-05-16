<?php
namespace Entidades;

class Denuncia
{
    private $id;
    private $status;
    private $emissao;
    private $longitude;
    private $latitude;
    private $autor;
    private $tipo;
    private $foto1;
    private $foto2;
    private $descricao;
    
    //Construtor
    public function __construct
    // Parametros
    (
        $id,
        $status,
        $emissao,
        $longitude,
        $latitude,
        $autor,
        $tipo,
        $foto1,
        $foto2,
        $descricao
    )
    // Funcao
    {
        $this-> setStatus($status);
        $this-> setEmissao($emissao);
        $this-> setLongitude($longitude);
        $this-> setLatitude($latitude);
        $this-> setAutor($autor);
        $this-> setTipo($tipo);
        $this-> setFoto1($foto1);
        $this-> setFoto2($foto2);
        $this-> setDescricao($descricao);
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getEmissao()
    {
        return $this->emissao;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getFoto1()
    {
        return $this->foto1;
    }

    public function getFoto2()
    {
        return $this->foto2;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setEmissao($emissao)
    {
        $this->emissao = $emissao;
    }

    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function setFoto1($foto1)
    {
        $this->foto1 = $foto1;
    }

    public function setFoto2($foto2)
    {
        $this->foto2 = $foto2;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    
    // Metodos
    
    // 'Finaliza as denuncias que passaram do prazo'
    public function finalizaDenuncias
    // ( Parametros )
    (
        $conection
    )
    // { Funcao }
    {               
        
        $dataLimite = date('yy-m-d', strtotime('-15 day'));     

        $query = "UPDATE denuncia
                  SET estado.denuncia = 'F'
                  WHERE emissao.denuncia < '$dataLimite'
                  ;";

        $acesso = mysqli_query($conection, $query);
        if ($acesso == false)
        {
            return 'Falha ao executar a query.';
        }
        else
        {            
            return true;
        }        
    }
    
    // 'Cadastra uma nova denuncia'
    public function cadastrarDenuncia
    // ( Parametros )
    (
        $conection
    )
    // { Funcao }
    {
        $controle = true;

        $emissao   = $this-> getEmissao();
        $longitude = $this-> getLongitude();
        $latitude  = $this-> getLatitude();
        $autor     = $this-> getAutor();
        $tipo      = $this-> getTipo();
        $foto      = $this-> getFoto1();
        $descricao = $this-> getDescricao();

        if($emissao == '')
        {
            $controle = false;
            $retorno  = "Campo de emissao vazio";
        }

        if($longitude == '')
        {
            $controle = false;
            $retorno  = "Campo de longitude vazio"; 
        }

        if($latitude == '')
        {
            $controle = false;
            $retorno  = "Campo de latitude vazio";
        }

        if($autor == '')
        {
            $controle = false;
            $retorno  = "Autor vazio";
        }

        if($tipo != 1 and $tipo != 2 and $tipo != 3)
        {
            $controle = false;
            $retorno  = "Tipo invalido";
        }

        if($foto == '')
        {
            $controle = false;
            $retorno  = "Foto nao inserida";
        }

        if($descricao == '')
        {
            $controle = false;
            $retorno  = "Descricao vazia";
        }

        if($controle == true)
        {            

            $query = "INSERT INTO denuncia
                     (emissao, longitude, latitude, autor, tipo, foto1, descricao)
                     VALUES
                     ('$emissao', '$longitude', '$latitude', '$autor', '$tipo', '$foto', '$descricao')
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

        return $json = array('action' => "cadastrarDenuncia",'ok' => $retorno);
    }
    
    // 'Atualiza a situacao de uma denuncia'
    public function atualizarDenuncia
    // ( Parametros )
    (
        $conection 
    )
    // { Funcao }
    {
        $controle = true ;
        
        $id       = $this-> getId();
        $status   = $this-> getStatus();
        $foto2    = $this-> getFoto2();        

        if($controle == true)
        {
            $query = "UPDATE denuncia
                      SET denuncia.status = '$status'
                      ,   denuncia.foto2  = '$foto2'
                      WHERE denuncia.id = '$id'
                      ;";
            
            $acesso = mysqli_query($conection, $query);
            if ($acesso == false)
            {
                return "ERRO";
            }
            else
            {            
                return true;
            }
        }

        return $json = array('action' => "atualizarDenuncia",'ok' => $retorno);
    }
    
    // 'Consulta uma denuncia'
    public function consultarDenuncia
    // ( Parametros )
    (
        $conection
    )
    // { Funcao }
    {
        $dataLimite = date('yymd', strtotime('-15 day'));        

        $query = "SELECT * 
                  FROM denuncia
                  ;";
        
        $acesso = mysqli_query($conection, $query);
        if ($acesso == false)
        {
            $json = array('action' => "consultarDenuncia", 'ok' => "ERRO");
        }
        else
        {            
            $qtDenuncia = mysqli_num_rows($acesso);

            if($qtDenuncia > 0)
            {
                while ($dados = mysqli_fetch_array($acesso))
                {
                    $retId[]     = $dados['ID'];
                    $retStatus[] = $dados['Estado'];
                    $retLat[]    = $dados['Latitude'];
                    $retLong[]   = $dados['Longitude'];
                    $retAutor[]  = $dados['Autor'];
                    $retTipo[]   = $dados['Tipo'];
                    $retFoto1[]  = $dados['Foto1'];
                    $retFoto2[]  = $dados['Foto2'];
                    $retDesc[]   = $dados['Descricao'];
                }

                $json = array('action'    => "consultarDenuncia", 
                            'ok'        => true,
                            'id'        => $retId,
                            'Status'    => $retStatus,
                            'Latitude'  => $retLat,
                            'Longitude' => $retLong,
                            'Autor'     => $retAutor,
                            'Tipo'      => $retTipo,
                            'Foto1'     => $retFoto1,                          
                            'Foto2'     => $retFoto2,                          
                            'Descricao' => $retDesc);    
            }
            else
            {
                $json = array('action' => "consultarDenuncia", 'ok' => true);
            }            
        }    
        
        return $json;
    }
    
}

