<?php
class Estudio{
    private $idestudio;
    private $nombreEstudio;
    private $grupo;
    private $tipo;
    private $contenedor;   
    private $area;
    private $tipoMuestra;
    private $tiempo;
    private $precio;
    private $estado;
    private $metodo;
    private $unidad;
    private $observaciones;

    public function __construct($idestudio, $nombreEstudio, $estado, $tiempo, $area, 
                                $metodo, $tipo, $contenedor, $grupo, $tipoMuestra,  $precio, 
                                $observaciones, $unidad){
        $this->idestudio=$idestudio;
        $this->nombreEstudio=$nombreEstudio;
        $this->grupo=$grupo;
        $this->tipo=$tipo;
        $this->contenedor=$contenedor;   
        $this->area=$area;
        $this->tipoMuestra=$tipoMuestra;
        $this->tiempo=$tiempo;
        $this->precio=$precio;
        $this->estado=$estado;
        $this->metodo=$metodo;
        $this->unidad=$unidad;
        $this->observaciones=$observaciones;
    }

    public function getIdEstudio(){
        return $this->idestudio;
    }    
    
    public function getNombreEstudio(){
        return $this->nombreEstudio;
    }    
    
    public function getGrupo(){
        return $this->grupo;
    }    

    public function getTipo(){
        return $this->tipo;
    }   

    public function getContenedor(){
        return $this->contenedor;
    }    

    public function getArea(){
        return $this->area;
    }    

    public function getTipoMuestra(){
        return $this->tipoMuestra;
    }    

    public function getTiempo(){
        return $this->tiempo;
    }    

    public function getPrecio(){
        return $this->precio;
    }    

    public function getEstado(){
        return $this->estado;
    }    

    public function getMetodo(){
        return $this->metodo;
    }    

    public function getObservaciones(){
        return $this->observaciones;
    }

    public function getUnidad(){
        return $this->unidad;
    }

}

?>