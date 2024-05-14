<?php
session_start();
require_once "../Modelo/Conexion.php";
$id = $_POST['id'];
$accion = $_POST['accion'];
$nombre = $_POST['nombre'];
$apellidoP = $_POST['apellidoP'];
$apellidoM = $_POST['apellidoM'];
$telefono = $_POST['telefono'];
$rfc = $_POST['rfc'];
$puesto = $_POST['puesto'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];


if($accion=="guardar"){

    $user = $_SESSION['user'];
    $pass= $_SESSION['pass'];
    $d = new Conexion("localhost","laboratorio",$user,$pass);
    $securePass = password_hash($password,PASSWORD_BCRYPT);
    $sqlcuenta = "INSERT INTO cuenta (usuario, password, tipousuario) values ('$usuario','$securePasss', 'Empleado')";
    $error = $d->ejecutar($sqlcuenta);
    
    if($error=="1"){
        
    }else{
        if(stristr(mysqli_error($d->getCon()),"Duplicate entry")!=FALSE){
            echo("Ya existe una usuario con ese nombre, pruebe con uno diferente");
        }else{
            echo($sqlcuenta." ".mysqli_error($d->getCon()));
        }
        
        return;
    }
    $sqlidCuenta = "SELECT  max(idcuenta) from cuenta";
    $resultado = $d->ejecutar($sqlidCuenta);
    $reg = mysqli_fetch_array($resultado);
    $idCuenta = $reg[0];

    $sqlGuardar = "INSERT INTO empleado(nombre, apellidoP, apellidoM, telefono, 
        rfc, puesto, idcuenta)
        VALUES ('$nombre', '$apellidoP', '$apellidoM', '$telefono', '$rfc', '$puesto', $idCuenta)";

    $error = $d->ejecutar($sqlGuardar);
    
    if($error=="1"){
        echo("Datos guardados correctamente");
    }else{
        echo($sqlGuardar);
    }

    mysqli_close($d->getCon()); 
}elseif ($accion=="editar"){
    $user = $_SESSION['user'];
    $pass= $_SESSION['pass'];
    $d = new Conexion("localhost","laboratorio",$user,$pass);
    $securePass = password_hash($password,PASSWORD_BCRYPT);
    $sqlidCuenta = "SELECT idcuenta from empleado where idempleado = $id";
    $resultado = $d->ejecutar($sqlidCuenta);
    $reg = mysqli_fetch_array($resultado);
    $idCuenta = $reg[0];
    
    $sqlGuardar = "UPDATE empleado set nombre = '$nombre', apellidoP = '$apellidoP', apellidoM ='$apellidoM',
        telefono = '$telefono', rfc='$rfc', puesto = '$puesto'
        where idempleado=$id";

    $error = $d->ejecutar($sqlGuardar);

    if($error!="1"){
        echo($sqlGuardar);
        mysqli_close($d->getCon()); 
        return;
    }


    $sqlEditCuenta = "UPDATE cuenta set usuario = '$usuario', password = '$securePass' where idcuenta = $idCuenta";
    $error = $d->ejecutar($sqlEditCuenta);

    if($error=="1"){
        echo("Datos editados correctamente");
    }else{
        echo($sqlEditCuenta);
        mysqli_close($d->getCon()); 
        return;
    }
}elseif($accion=='eliminar'){
    $user = $_SESSION['user'];
    $pass= $_SESSION['pass'];
    $d = new Conexion("localhost","laboratorio",$user,$pass);
    $sqlGuardar = "DELETE FROM empleado where idempleado = $id";
    $error = $d->ejecutar($sqlGuardar);
    
    if($error=="1"){
        //echo("El registró se eliminó correctamente");
    }else{
        echo($sqlGuardar);
        return;
    }

    $sqlcuenta = "DELETE FROM cuenta  WHERE idcuenta =  
    (select idcuenta from empleado where idempleado = $id)";
    $error = $d->ejecutar($sqlcuenta);
    if($error=="1"){
        echo("El registró se eliminó correctamente");
    }else{
        echo($sqlGuardar);
        return;
    }
}

?>