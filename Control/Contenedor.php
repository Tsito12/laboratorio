<?php

require_once "../Modelo/Conexion.php";
session_start();
$accion = $_POST['accion'];
$user = $_SESSION['user'];
$pass= $_SESSION['pass'];
$d = new Conexion("localhost","laboratorio",$user,$pass);
if($accion == "guardar"){
    $nombre      = $_POST['nombre'];
    
    $consulta = "INSERT INTO contenedor(nombre) VALUES ('$nombre')";
    $error = $d->ejecutar($consulta);
    
    if($error=="1"){
        echo("Datos guardados correctamente");
    }else{
        echo($consulta);
    }
    //echo($error);
    //echo($consulta);

}else if($accion == "editar"){
    $id          = $_POST['id'];
    $nombre      = $_POST['nombre'];
    $query="UPDATE contenedor  SET nombre = '$nombre' WHERE idContenedor = $id";
    $error = $d->ejecutar($query);
    
    if($error=="1"){
        echo("Datos Editados correctamente");
    }else{
        echo($error);
    }

}elseif($accion == "eliminar"){
    $codigo = $_POST['id'];
    $sql = "DELETE from contenedor where idContenedor = $codigo";
    $error = $d->ejecutar($sql);
    if($error=="1"){
        echo("Eliminado correctamente");
    }else{
        echo($error);
    }
    //echo($sql);
}

?>