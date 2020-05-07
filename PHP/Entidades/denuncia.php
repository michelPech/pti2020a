<?php
namespace Entidades;

class denuncia
{
    private $idDenuncia;
    private $statusDenuncia;
    private $longitudeDenuncia;
    private $latitudeDenuncia;
    private $autorDenuncia;
    private $tipoDenuncia;
    private $foto1Denuncia;
    private $foto2Denuncia;
    private $foto3Denuncia;
    private $descricaoDenuncia;
    
    //Construtor
    public function denuncia($statusDenuncia, $longitudeDenuncia, $latitudeDenuncia, 
                             $autorDenuncia, $tipoDenuncia, $foto1Denuncia, 
                             $foto2Denuncia, $foto3Denuncia, $descricaoDenuncia)
    {
        $this-> setStatusDenuncia($statusDenuncia);
        $this-> setLongitudeDenuncia($longitudeDenuncia);
        $this-> setLatitudeDenuncia($latitudeDenuncia);
        $this-> setAutorDenuncia($autorDenuncia);
        $this-> setTipoDenuncia($tipoDenuncia);
        $this-> setFoto1Denuncia($foto1Denuncia);
        $this-> setFoto2Denuncia($foto2Denuncia);
        $this-> setFoto3Denuncia($foto3Denuncia);
        $this-> setDescricaoDenuncia($descricaoDenuncia);
    }
    
    // M�todos de atributo
    public function getIdDenuncia()
    {
        return $this->idDenuncia;
    }
    
    public function getStatusDenuncia()
    {
        return $this->statusDenuncia;
    }

    public function getLongitudeDenuncia()
    {
        return $this->longitudeDenuncia;
    }

    public function getLatitudeDenuncia()
    {
        return $this->latitudeDenuncia;
    }

    public function getAutorDenuncia()
    {
        return $this->autorDenuncia;
    }

    public function getTipoDenuncia()
    {
        return $this->tipoDenuncia;
    }

    public function getFoto1Denuncia()
    {
        return $this->foto1Denuncia;
    }

    public function getFoto2Denuncia()
    {
        return $this->foto2Denuncia;
    }

    public function getFoto3Denuncia()
    {
        return $this->foto3Denuncia;
    }

    public function getDescricaoDenuncia()
    {
        return $this->descricaoDenuncia;
    }

    public function setStatusDenuncia($statusDenuncia)
    {
        $this->statusDenuncia = $statusDenuncia;
    }
    
    public function setLongitudeDenuncia($longitudeDenuncia)
    {
        $this->longitudeDenuncia = $longitudeDenuncia;
    }

    public function setLatitudeDenuncia($latitudeDenuncia)
    {
        $this->latitudeDenuncia = $latitudeDenuncia;
    }

    public function setAutorDenuncia($autorDenuncia)
    {
        $this->autorDenuncia = $autorDenuncia;
    }

    public function setTipoDenuncia($tipoDenuncia)
    {
        $this->tipoDenuncia = $tipoDenuncia;
    }

    public function setFoto1Denuncia($foto1Denuncia)
    {
        $this->foto1Denuncia = $foto1Denuncia;
    }

    public function setFoto2Denuncia($foto2Denuncia)
    {
        $this->foto2Denuncia = $foto2Denuncia;
    }

    public function setFoto3Denuncia($foto3Denuncia)
    {
        $this->foto3Denuncia = $foto3Denuncia;
    }

    public function setDescricaoDenuncia($descricaoDenuncia)
    {
        $this->descricaoDenuncia = $descricaoDenuncia;
    }    
    
    // Metodos
    public function finalizaDenuncias($concetion, $date)
    {        
        $query = 'UPDATE denuncia
                  SET status.denuncia = `F`
                  WHERE data.denuncia < `$date` ?
                  ; ';
        
        $acesso = mysqli_query($conection, $query);
        $result = mysqli_num_rows($acesso);
        
        if($result == 0)
        {
            $retorno = false;
            return $retorno;
        }
        else
        {
            $retorno = true;
            return $retorno;
        }
    }
    
    public function cadastraDenuncia($conection, $longitudeDenuncia, $latitudeDenuncia, 
                                     $autorDenuncia, $tipoDenuncia, $foto1Denuncia, 
                                     $descricaoDenuncia)
    {
        $query = 'INSERT INTO denuncia
                  (longitude, latitude, autor, tipo, foto1, descricao)
                  VALUES
                  (`$longitudeDenuncia`, `$latitudeDenuncia`, `$autorDenuncia`,
                   `$tipoDenuncia`, `$foto1Denuncia`, `$descricaoDenuncia`)
                  ;';
        
        $acesso = mysqli_query($conection, $query);
        $result = mysqli_num_rows($acesso);
        
        if($result == 0)
        {
            $retorno = false;
            return $retorno;
        }
        else
        {
            $retorno = true;
            return $retorno;
        }
        
    }
    
    public function atualizaDenuncia($conection, $idDenuncia, $statusDenuncia,
                                     $foto2Denuncia, $foto3Denuncia)
    {
        $query = 'UPDATE denuncia
                  SET status.denuncia = `$statusDenuncia`
                  ,   foto2.denuncia  = `$foto2Denuncia`
                  ,   foto3.denuncia  = `$foto3Denuncia`
                  WHERE id.denuncia = `$idDenuncia`
                  ;';
        
        $acesso = mysqli_query($conection, $query);
        $result = mysqli_num_rows($acesso);
        
        if($result == 0)
        {
            $retorno = false;
            return $retorno;
        }
        else
        {
            $retorno = true;
            return $retorno;
        }
    }
    
    public function consultaDenuncia($conection, $idDenuncia)
    {
        $query = 'SELECT * 
                  FROM denuncia
                  WHERE id.denuncia = `$idDenuncia`
                  ;';
        
        $acesso = mysqli_query($conection, $query);
        $result = mysqli_num_rows($acesso);
        
        if($result == 0)
        {
            $retorno = false;
            return $retorno;
        }
        else
        {
            $retorno = true;
            return $retorno;
        }
            
    }
    
}
