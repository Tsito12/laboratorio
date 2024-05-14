<?php
require_once "../Modelo/Conexion.php";
session_start();

$accion = $_POST['accion'];
$user = $_SESSION['user'];
$pass= $_SESSION['pass'];

$d = new Conexion("localhost","laboratorio",$user,$pass);

if($accion == "guardar"){
    $nombre        = $_POST['nombre'];
    $grupo         = $_POST['grupo'];
    $tipo          = $_POST['tipo'];
    $area          = $_POST['area'];
    $contenedor    = $_POST['contenedor'];
    $tipoMuestra   = $_POST['tipomuestra'];
    $tiempo        = $_POST['tiempo'];
    $estado        = $_POST['estado'];
    $metodo        = $_POST['metodo'];
    $precio        = $_POST['precio'];
    $uniad         = $_POST['unidad'];
    $observaciones = $_POST['observaciones'];
    if($estado==''){
        $estado=0;
    }
    $consulta = "INSERT INTO estudio(nombre, estado, tiempoProced, grupo, metodo, tipo, contenedor,
                 area, tipoMuestra, precio, observaciones, unidad) VALUES ('$nombre', '$estado', $tiempo, 
                 '$grupo', '$metodo','$tipo', '$contenedor', '$area', '$tipoMuestra', $precio, 
                 '$observaciones', '$uniad')";
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
    $grupo       = $_POST['grupo'];
    $tipo        = $_POST['tipo'];
    $area        = $_POST['area'];
    $contenedor  = $_POST['contenedor'];
    $tipoMuestra = $_POST['tipomuestra'];
    $tiempo      = $_POST['tiempo'];
    $estado      = $_POST['estado'];
    $metodo      = $_POST['metodo'];
    $precio      = $_POST['precio'];
    $uniad         = $_POST['unidad'];
    $observaciones = $_POST['observaciones'];
    if($estado==''){
        $estado=0;
    }
    $query="UPDATE estudio  SET nombre = '$nombre', estado = '$estado', 
            tiempoProced= $tiempo, grupo = '$grupo', metodo = '$metodo', tipo = '$tipo', 
            contenedor = '$contenedor', area = '$area', tipoMuestra = '$tipoMuestra', 
            precio = $precio, observaciones = '$observaciones', unidad = '$uniad' WHERE idEstudio = $id";
    $error = $d->ejecutar($query);
    
    if($error=="1"){
        echo("Datos Editados correctamente");
    }else{
        echo($error);
    }

}elseif($accion == "eliminar"){
    $codigo = $_POST['id'];
    $sql = "DELETE from estudio where idEstudio = $codigo";
    $error = $d->ejecutar($sql);
    if($error=="1"){
        echo("Eliminado correctamente");
    }else{
        echo($error);
    }
    //echo($sql);
}
elseif($accion == "obtener"){
    $id          = $_POST['id'];
    $nombre      = $_POST['nombre'];
    $grupo       = $_POST['grupo'];
    $tipo        = $_POST['tipo'];
    $area        = $_POST['area'];
    $contenedor  = $_POST['contenedor'];
    $tipoMuestra = $_POST['tipomuestra'];
    $tiempo      = $_POST['tiempo'];
    $estado      = $_POST['estado'];
    $metodo      = $_POST['metodo'];
    $precio      = $_POST['precio'];
    $uniad       = $_POST['unidad'];
    $observaciones = $_POST['observaciones'];
    echo($id.",".$nombre.",".$grupo.",".$tipo.",".$area.",".$contenedor.",".$tipoMuestra.",".$tiempo.",".
         $estado.",".$metodo.",".$precio.",".$observaciones.",".$uniad);
}
elseif($accion=='guardarPerfil'){
    $nombrePerfil = $_POST['nombre'];
    $ids = $_POST['ids'];
    /*$strestudios="";
    
    echo("Tamaño del arreglo: ".count($ids)." ".$strestudios);*/
    $sqlPerfil = "INSERT INTO perfil(nombre) VALUES('$nombrePerfil')";
    $error = $d->ejecutar($sqlPerfil);
    /*if($error!="1"){
        echo($error);
        return;
    }*/
    $resultado = $d->ejecutar("SELECT max(idperfil) from perfil");
    $reg = mysqli_fetch_array($resultado);
    $idPerfil = $reg[0];
    for($i = 0; $i<count($ids);$i++){
        $sqlDetalle = "INSERT INTO detalleperfil VALUES ($idPerfil, $ids[$i])";
        
        $errorDetalle = $d->ejecutar($sqlDetalle);
        
        if($errorDetalle=="1"){
            echo("Perfil guardado");
            //return;
        }else{
            echo($errorDetalle);
            return;
        }
        
        
    }
    //$error = $d->ejecutar($consulta);
}elseif ($accion=="EditarPerfil"){
    $nombrePerfil = $_POST['nombre'];
    $ids = $_POST['ids'];
    $idPerfil = $_POST['idP'];
    /*$strestudios="";
    
    echo("Tamaño del arreglo: ".count($ids)." ".$strestudios);*/
    $sqlEditPerfil = "DELETE from detalleperfil where idperfil=$idPerfil";
    $error = $d->ejecutar($sqlEditPerfil);
    /*if($error!="1"){
        echo($error);
        return;
    }*/
    for($i = 0; $i<count($ids);$i++){
        $sqlDetalle = "INSERT INTO detalleperfil VALUES ($idPerfil, $ids[$i])";
        
        $errorDetalle = $d->ejecutar($sqlDetalle);
        
        if($errorDetalle=="1"){
            echo("Perfil guardado");
            //return;
        }else{
            echo($errorDetalle);
            return;
        }
        
    }
}

?>