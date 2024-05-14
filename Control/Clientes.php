<?php
session_start();
require_once "../Modelo/Conexion.php";
$accion = $_POST['accion'];
$nombre = $_POST['nombre'];
  $apellidoP = $_POST['apellidoP'];
  $apellidoM = $_POST['apellidoM'];
  $edad = $_POST['edad'];
  $periodo = $_POST['periodo'];
  $sexo = $_POST['sexo'];
  $email = $_POST['email'];
  $telefono = $_POST['telefono'];
  $calle = $_POST['calle'];
  $colonia = $_POST['colonia'];
  $poblacion = $_POST['poblacion'];
  $municipio = $_POST['municipio'];
  $estado = $_POST['estado'];
  $cp = $_POST['codigopostal'];
  $estatura = $_POST['estatura'];
  $peso = $_POST['peso'];
  $tipoc = $_POST['tipoc'];
  $razonf = $_POST['razonf'];
  $rfc = $_POST['rfc'];
  $correof = $_POST['correof'];
  $domiciliof = $_POST['domiciliof'];
  $poblacionf = $_POST['poblacionf'];
  $telefonof = $_POST['telefonof'];
  $codigopf = $_POST['codigopf'];
  $rutaimg = $_POST['rutaimg'];

if($accion=="guardar"){

  if($peso==""||$peso==null){
    $peso=0;
  }
  if($estatura==""||$estatura==null){
    $estatura=0;
  }
  $user = $_SESSION['user'];
  $pass= $_SESSION['pass'];
  $d = new Conexion("localhost","laboratorio",$user,$pass);

  

  // Se crea la cuenta del usuario con su nombre y apellidos
  $nombreUsr = $email;
  $usrPass=$nombre.$apellidoP.$apellidoM;
  $sqlcuenta = "INSERT INTO cuenta (usuario, password, tipousuario) values ('$nombreUsr','$usrPass', 'Cliente')";
  $error = $d->ejecutar($sqlcuenta);
    
    if($error=="1"){
        
    }else{
        echo($consulta);
        return;
    }
  $sqlidCuenta = "SELECT  max(idcuenta) from cuenta";
  $resultado = $d->ejecutar($sqlidCuenta);
  $reg = mysqli_fetch_array($resultado);
  $idCuenta = $reg[0];

  if($rfc==""||$rfc==null){
    $consulta = "INSERT INTO cliente(nombre, apellidoP, apellidoM, edad, periodoedad, sexo, 
               telefono, email, imagen, estatura, peso, idtipocliente, idcuenta, calle, colonia, 
               poblacion, municipio, estado, codigoPostal) VALUES ('$nombre', '$apellidoP',
               '$apellidoM',$edad,'$periodo','$sexo', 
               '$telefono','$email',  '$rutaimg', $estatura,$peso,$tipoc,$idCuenta, '$calle',
               '$colonia','$poblacion','$municipio','$estado','$cp')";
  }else{
    $consulta = "INSERT INTO cliente(nombre, apellidoP, apellidoM, edad, periodoedad, sexo, 
               telefono, email, rfc, imagen, estatura, peso, idtipocliente, idcuenta, calle, colonia, 
               poblacion, municipio, estado, codigoPostal, nombref, correof, domf, pobf, telefonof, 
               codigopostalf) VALUES ('$nombre', '$apellidoP','$apellidoM',$edad,'$periodo','$sexo', 
               '$telefono','$email', '$rfc', '$rutaimg', $estatura,$peso,$tipoc,$idCuenta, '$calle',
               '$colonia','$poblacion','$municipio','$estado','$cp', 
               '$razonf','$correof','$domiciliof','$poblacionf',
               '$telefonof',$codigopf)";
  }
  
    $error = $d->ejecutar($consulta);
    
    if($error=="1"){
        echo("Datos guardados correctamente");
    }else{
        echo($consulta);
    }

    mysqli_close($d->getCon()); 

} elseif($accion=="subirImg"){
  $imagen = $_FILES['imagen'];
  $target_dir = "/var/www/html/Laboratorio/Uploads/";
  $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["imagen"]["tmp_name"]);
    if($check !== false) {
      //echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "El archivo no es una imagen";
      return;
      $uploadOk = 0;
    }
    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
      //echo "El archivo ". htmlspecialchars( basename( $_FILES["imagen"]["name"])). " se subio correctamente.";
    } else {
      echo "Hubo un problema al subir la imagen.";
    }
}elseif($accion=="editar"){
  $user = $_SESSION['user'];
  $pass= $_SESSION['pass'];
  $d = new Conexion("localhost","laboratorio",$user,$pass);
  $idc = $_POST['id'];
  if($rfc==""||$rfc==null){
    $consulta = "UPDATE  cliente SET nombre = '$nombre', apellidoP='$apellidoP', apellidoM = '$apellidoM',
    edad = $edad, periodoedad = '$periodo', sexo = '$sexo', telefono = '$telefono', email = '$email', 
    imagen = '$rutaimg', estatura = $estatura, peso = $peso, idtipocliente = $tipoc,
    calle = '$calle', colonia = '$colonia', poblacion = '$poblacion', municipio = '$municipio', 
    estado = '$estado', codigoPostal = '$cp' WHERE idcliente = $idc"; 
  }else{

    $consulta = "UPDATE  cliente SET nombre = '$nombre', apellidoP='$apellidoP', apellidoM = '$apellidoM',
    edad = $edad, periodoedad = '$periodo', sexo = '$sexo', telefono = '$telefono', email = '$email', 
    imagen = '$rutaimg', estatura = $estatura, peso = $peso, idtipocliente = $tipoc,
    calle = '$calle', colonia = '$colonia', poblacion = '$poblacion', municipio = '$municipio', 
    estado = '$estado', codigoPostal = '$cp', nombref = '$razonf', rfc = '$rfc', correof = '$correof',
    domf = '$domiciliof', pobf = '$poblacionf', telefonof = '$telefonof', codigopostalf = $codigopf
    WHERE idcliente = $idc";
  }

  $error = $d->ejecutar($consulta);
    
    if($error=="1"){
        echo("Datos Editados correctamente");
    }else{
        echo($consulta);
    }
    mysqli_close($d->getCon());
}elseif($accion == "eliminar"){
  $user = $_SESSION['user'];
  $pass= $_SESSION['pass'];
  $d = new Conexion("localhost","laboratorio",$user,$pass);
  $codigo = $_POST['id'];
  $sql = "DELETE from cliente where idcliente = $codigo";
  $error = $d->ejecutar($sql);
  if($error=="1"){
      echo("Eliminado correctamente");
  }else{
      echo($sql);
  }
  //echo($sql);
}



?>