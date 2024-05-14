<?php
session_start();
require_once "../Modelo/Conexion.php";
$id = $_POST['id'];
$idValor = $_POST['idValor'];
$accion = $_POST['accion'];
$sexo = $_POST['sexo'];
$edadInicial = $_POST['edadinicial'];
$periodoInicial = $_POST['periodoinicial'];
$edadfinal = $_POST['edadfinal'];
$periodoFinal = $_POST['periodofinal'];
$descripcion = $_POST['descripcion'];
$valorinicial = $_POST['valorinicial'];
$valorfinal = $_POST['valorfinal'];
$unidad = $_POST['unidad'];
$alturainicial = $_POST['alturainicial'];
$alturafinal = $_POST['alturafinal'];

if($alturainicial==""||$alturainicial==null){
    $alturainicial=0;
}
if($alturafinal==""||$alturafinal==null){
    $alturafinal=0;
}
$nota = $_POST['nota'];


if($accion=="guardar"){

    $user = $_SESSION['user'];
    $pass= $_SESSION['pass'];
    $d = new Conexion("localhost","laboratorio",$user,$pass);

    /*
    idestudio,sexo,estadoInicial,estadoFinal,descripcion,valorInicial,valorFinal,unidad,alturaInicial,alturaFinal,nota
    */
    $sql = "INSERT INTO valorreferencia (idestudio,sexo,edadInicial,periodoInicial,edadFinal,
            periodoFinal,descripcion,
                  valorInicial,valorFinal,unidad,alturaInicial,alturaFinal,nota) values 
                  ($id,'$sexo',$edadInicial,'$periodoInicial',$edadfinal,'$periodoFinal','$descripcion',
                  '$valorinicial',
                  '$valorfinal','$unidad',$alturainicial,$alturafinal,'$nota')";
    $error = $d->ejecutar($sql);
    
    
    if($error=="1"){
        echo("Datos guardados correctamente");
    }else{
        echo($sql."".mysqli_error($d->getCon()));
    }

    mysqli_close($d->getCon()); 
}elseif ($accion=="editar"){
    $user = $_SESSION['user'];
    $pass= $_SESSION['pass'];
    $d = new Conexion("localhost","laboratorio",$user,$pass);
    
    $sql = "UPDATE valorreferencia set sexo = '$sexo', edadInicial = $edadInicial, periodoInicial = '$periodoInicial',
                    edadFinal = $edadfinal, periodoFinal='$periodoFinal',descripcion = '$descripcion', 
                    valorInicial = '$valorinicial', 
                    valorFinal = '$valorfinal', unidad = '$unidad', alturaInicial = $alturainicial,
                    alturaFinal = $alturafinal, nota = '$nota' where idValorRef = $idValor";
    $resultado = $d->ejecutar($sql);
    $error = $d->ejecutar($sql);


    if($error=="1"){
        echo("Datos editados correctamente");
        mysqli_close($d->getCon());
    }else{
        echo($sql."".mysqli_error($d->getCon()));
        mysqli_close($d->getCon()); 
        return;
    }
}elseif($accion=='eliminar'){
    $user = $_SESSION['user'];
    $pass= $_SESSION['pass'];
    $d = new Conexion("localhost","laboratorio",$user,$pass);
    $sqlGuardar = "DELETE FROM valorreferencia where idValorRef = $idValor";
    $error = $d->ejecutar($sqlGuardar);
    if($error=="1"){
        echo("El registró se eliminó correctamente");
        mysqli_close($d->getCon()); 
    }else{
        echo($sqlGuardar);
        mysqli_close($d->getCon());
        return;
    }
}

?>