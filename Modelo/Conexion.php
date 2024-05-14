<?php
require_once "Estudio.php";
 class Conexion{
    private $conexion;
    public function __construct($servidor, $bd, $usuario, $password){
        $this->conexion=mysqli_connect($servidor,$usuario,$password,$bd);
        
        if(!$this->conexion){
            echo "NO conecto esta madre";
            die("Error al conectar: ".mysqli_connect_errno());
        }

        $selBD = mysqli_select_db($this->conexion,$bd);

        if(!$selBD){
            die("Error al seleccionar la base de datos");
        }
    }

    public function getCon(){
        return $this->conexion;
    }

    public function ejecutar($query){
        return mysqli_query($this->conexion,$query);
    }

    public function getEstudios(){
        $sql ="SELECT * FROM `estudio` ORDER BY nombre;";
        $estudios = array();
        $res = $this->ejecutar($sql);
        if(!$res){
            printf("Errormessage: %s\n", mysqli_error($this->getCon()));
        }
        while($reg = mysqli_fetch_array($res)){
            $e = new Estudio($reg[0],$reg[1],$reg[2],$reg[3],$reg[4],$reg[5],$reg[6],$reg[7],$reg[8],
                             $reg[9], $reg[10], $reg[11], $reg[12]);
            //var_dump($ap);
            array_push($estudios,$e);
        }
        return $estudios;
    }

    public function getEstudiosActivos(){
        $sql ="SELECT * FROM `estudio` where estado = 1 ORDER BY nombre;";
        $estudios = array();
        $res = $this->ejecutar($sql);
        if(!$res){
            printf("Errormessage: %s\n", mysqli_error($this->getCon()));
        }
        while($reg = mysqli_fetch_array($res)){
            $e = new Estudio($reg[0],$reg[1],$reg[2],$reg[3],$reg[4],$reg[5],$reg[6],$reg[7],$reg[8],
                             $reg[9], $reg[10], $reg[11], $reg[12]);
            //var_dump($ap);
            array_push($estudios,$e);
        }
        return $estudios;
    }

    public function getPerfiles(){
        $sql ="SELECT * FROM `estudio` WHERE tipo='perfil' AND NOT EXISTS (SELECT * from perfil where nombre=estudio.nombre) ORDER BY nombre;";
        $estudios = array();
        $res = $this->ejecutar($sql);
        if(!$res){
            printf("Errormessage: %s\n", mysqli_error($this->getCon()));
        }
        while($reg = mysqli_fetch_array($res)){
            $e = new Estudio($reg[0],$reg[1],$reg[2],$reg[3],$reg[4],$reg[5],$reg[6],$reg[7],$reg[8],
                             $reg[9], $reg[10], $reg[11], $reg[12]);
            //var_dump($ap);
            array_push($estudios,$e);
        }
        return $estudios;
    }

    public function getPruebas(){
        $sql ="SELECT * FROM `estudio` WHERE tipo='prueba' ORDER BY nombre;";
        $estudios = array();
        $res = $this->ejecutar($sql);
        if(!$res){
            printf("Errormessage: %s\n", mysqli_error($this->getCon()));
        }
        while($reg = mysqli_fetch_array($res)){
            $e = new Estudio($reg[0],$reg[1],$reg[2],$reg[3],$reg[4],$reg[5],$reg[6],$reg[7],$reg[8],
                             $reg[9], $reg[10], $reg[11], $reg[12]);
            //var_dump($ap);
            array_push($estudios,$e);
        }
        return $estudios;
    }

    public function getPerfilesEditar(){
        $sql ="SELECT idperfil, e.nombre, estado, tiempoProced, area, metodo, tipo, contenedor, grupo, tipoMuestra, precio FROM `estudio` as e INNER JOIN perfil on e.nombre = perfil.nombre  ORDER BY e.nombre ;";
        $estudios = array();
        $res = $this->ejecutar($sql);
        if(!$res){
            printf("Errormessage: %s\n", mysqli_error($this->getCon()));
        }
        while($reg = mysqli_fetch_array($res)){
            $e = new Estudio($reg[0],$reg[1],$reg[2],$reg[3],$reg[4],$reg[5],$reg[6],$reg[7],$reg[8],
                             $reg[9], $reg[10], $reg[11], $reg[12]);
            //var_dump($ap);
            array_push($estudios,$e);
        }
        return $estudios;
    }

    public function getDetallePerfil($idperfil){
        $sql ="SELECT e.idestudio, e.nombre, estado, tiempoProced, area, metodo, tipo, contenedor, grupo, 
               tipoMuestra, precio FROM `estudio` as e INNER JOIN detalleperfil on 
               e.idestudio = detalleperfil.idestudio where detalleperfil.idperfil=$idperfil 
               ORDER BY e.nombre ;";
        $estudios = array();
        $res = $this->ejecutar($sql);
        if(!$res){
            //printf("Errormessage: %s\n", mysqli_error($this->getCon()));
            echo($sql);
        }
        while($reg = mysqli_fetch_array($res)){
            $e = new Estudio($reg[0],$reg[1],$reg[2],$reg[3],$reg[4],$reg[5],$reg[6],$reg[7],$reg[8],
                             $reg[9], $reg[10], $reg[11], $reg[12]);
            //var_dump($ap);
            array_push($estudios,$e);
        }
        return $estudios;
    }
}

/*
$obj = new Conexion("localhost","laboratorio","directoroperativo","Prueba01.");
var_dump($obj->getCon());
*/

?>