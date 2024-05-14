<?php
session_start();
require_once "../Modelo/Conexion.php";
$id = $_POST['id'];
$accion = $_POST['accion'];
$nombre = $_POST['nombre'];
$apellidoP = $_POST['apellidoP'];
$apellidoM = $_POST['apellidoM'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$calle = $_POST['calle'];
$colonia = $_POST['colonia'];
$poblacion = $_POST['poblacion'];
$municipio = $_POST['municipio'];
$estado = $_POST['estado'];
$cp = $_POST['codigopostal'];
$razonf = $_POST['razonf'];
$rfc = $_POST['rfc'];
$convenio = $_POST['convenio'];
$fechaConvenio = $_POST['fechaconvenio'];


if($accion=="guardar"){

    $user = $_SESSION['user'];
    $pass= $_SESSION['pass'];
    $d = new Conexion("localhost","laboratorio",$user,$pass);
    if($convenio==''){
        $convenio=0;
        $fechaConvenio=null;
    }

    if(($rfc==null||$rfc=="")&&($fechaConvenio!=null||$fechaConvenio!="")){
        $sqlGuardar = "INSERT INTO doctor(nombre, apellidoP, apellidoM, telefono, email, 
        calle, colonia, poblacion, municipio, estado, codigoPostal, convenio, fechaconvenio)
        VALUES ('$nombre', '$apellidoP', '$apellidoM', '$telefono', '$email', '$calle', '$colonia',
        '$poblacion','$municipio','$estado','$cp',$convenio, '$fechaConvenio')";
    }if(($rfc!=null||$rfc!="")&&($fechaConvenio!=null||$fechaConvenio!="")){
        $sqlGuardar = "INSERT INTO doctor(nombre, apellidoP, apellidoM, telefono, email, 
        calle, colonia, poblacion, municipio, estado, codigoPostal, convenio, fechaconvenio, rfc, 
        razonsocial)
        VALUES ('$nombre', '$apellidoP', '$apellidoM', '$telefono', '$email', '$calle', '$colonia',
        '$poblacion','$municipio','$estado','$cp',$convenio, '$fechaConvenio','$rfc','$razonf')";
    }if(($rfc==null||$rfc=="")&&($fechaConvenio==null||$fechaConvenio=="")){
        $sqlGuardar = "INSERT INTO doctor(nombre, apellidoP, apellidoM, telefono, email, 
        calle, colonia, poblacion, municipio, estado, codigoPostal, convenio, fechaconvenio)
        VALUES ('$nombre', '$apellidoP', '$apellidoM', '$telefono', '$email', '$calle', '$colonia',
        '$poblacion','$municipio','$estado','$cp',$convenio, NULL)";
    }if(($rfc!=null||$rfc!="")&&($fechaConvenio==null||$fechaConvenio=="")){
        $sqlGuardar = "INSERT INTO doctor(nombre, apellidoP, apellidoM, telefono, email, 
        calle, colonia, poblacion, municipio, estado, codigoPostal, convenio, fechaconvenio, rfc, 
        razonsocial)
        VALUES ('$nombre', '$apellidoP', '$apellidoM', '$telefono', '$email', '$calle', '$colonia',
        '$poblacion','$municipio','$estado','$cp',$convenio, NULL,'$rfc','$razonf')";
    }

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
    if($convenio==''){
        $convenio=0;
        $fechaConvenio=null;
    }

    if(($rfc==null||$rfc=="")&&($fechaConvenio!=null||$fechaConvenio!="")){
        $sqlGuardar = "UPDATE doctor set nombre = '$nombre', apellidoP = '$apellidoP', apellidoM ='$apellidoM',
        telefono = '$telefono', email = '$email', calle = '$calle', colonia = '$colonia', 
        poblacion = '$poblacion', municipio = '$municipio', estado = '$estado', codigoPostal = '$cp', 
        convenio = $convenio, fechaconvenio = '$fechaConvenio', rfc=null, razonsocial = null
        where iddoctor=$id";
    }if(($rfc!=null||$rfc!="")&&($fechaConvenio!=null||$fechaConvenio!="")){
        $sqlGuardar = "UPDATE doctor set nombre = '$nombre', apellidoP = '$apellidoP', apellidoM ='$apellidoM',
        telefono = '$telefono', email = '$email', calle = '$calle', colonia = '$colonia', 
        poblacion = '$poblacion', municipio = '$municipio', estado = '$estado', codigoPostal = '$cp', 
        convenio = $convenio, fechaconvenio = '$fechaConvenio', rfc = '$rfc', razonsocial='$razonf'
        where iddoctor = $id";
    }if(($rfc==null||$rfc=="")&&($fechaConvenio==null||$fechaConvenio=="")){
        $sqlGuardar = "UPDATE doctor set nombre = '$nombre', apellidoP = '$apellidoP', apellidoM ='$apellidoM',
        telefono = '$telefono', email = '$email', calle = '$calle', colonia = '$colonia', 
        poblacion = '$poblacion', municipio = '$municipio', estado = '$estado', codigoPostal = '$cp', 
        convenio = $convenio, fechaconvenio = NULL, rfc=null, razonsocial = null where iddoctor=$id";
    }if(($rfc!=null||$rfc!="")&&($fechaConvenio==null||$fechaConvenio=="")){
        $sqlGuardar = "UPDATE doctor set nombre = '$nombre', apellidoP = '$apellidoP', apellidoM ='$apellidoM',
        telefono = '$telefono', email = '$email', calle = '$calle', colonia = '$colonia', 
        poblacion = '$poblacion', municipio = '$municipio', estado = '$estado', codigoPostal = '$cp', 
        convenio = $convenio, fechaconvenio = NULL, rfc = '$rfc', razonsocial='$razonf'
        where iddoctor = $id";
    }

    $error = $d->ejecutar($sqlGuardar);
    
    if($error=="1"){
        echo("Datos editados correctamente");
    }else{
        echo($sqlGuardar);
    }
}elseif($accion=='eliminar'){
    $user = $_SESSION['user'];
    $pass= $_SESSION['pass'];
    $d = new Conexion("localhost","laboratorio",$user,$pass);
    $sqlGuardar = "DELETE FROM doctor where iddoctor = $id";
    $error = $d->ejecutar($sqlGuardar);
    
    if($error=="1"){
        echo("El registró se eliminó correctamente");
    }else{
        echo($sqlGuardar);
    }
}

?>