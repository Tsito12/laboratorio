<?php
session_start();
require_once "../Modelo/Conexion.php";
$accion = $_POST['accion'];
$idorden=$_POST['idOrden'];
$idestudio = $_POST['idestudio'];

if($accion=='guardar'){
    $user = $_SESSION['user'];
    $pass= $_SESSION['pass'];
    $d = new Conexion("localhost","laboratorio",$user,$pass);
    $parametro = $_POST['parametro'];
    $resultado = $_POST['resultado'];
    $unidad = $_POST['unidad'];
    $idvalor = $_POST['valorReferencia'];
    $img1 = $_POST['rutaimg1'];
    $img2 = $_POST['rutaimg2'];
    $nota = $_POST['nota'];
    $sql = "INSERT INTO resultado (idorden, idestudio, parametro, resultado, unidad, idvalorreferencia, 
            imagen1, imagen2, nota) VALUES ($idorden, $idestudio, '$parametro', '$resultado', '$unidad', 
            $idvalor, '$img1', '$img2', '$nota')";
    $result = $d->ejecutar($sql);
    if($result=="1"){
        echo("Datos guardados correctamente");
    }else{
        echo($consulta.mysqli_error($d->getCon()));
    }

    mysqli_close($d->getCon()); 

}
elseif($accion=='editar'){
    $user = $_SESSION['user'];
    $pass= $_SESSION['pass'];
    $d = new Conexion("localhost","laboratorio",$user,$pass);
    $idresultado = $_POST['idresultado'];
    $parametro = $_POST['parametro'];
    $resultado = $_POST['resultado'];
    $unidad = $_POST['unidad'];
    $idvalor = $_POST['valorReferencia'];
    $img1 = $_POST['rutaimg1'];
    $img2 = $_POST['rutaimg2'];
    $nota = $_POST['nota'];
    $sql = "UPDATE resultado set idestudio = $idestudio, parametro = '$parametro', 
            resultado = '$resultado', unidad = '$unidad', idvalorreferencia = $idvalor, 
            imagen1 = '$img1', imagen2 = '$img2', nota='$nota' where idresultado = $idresultado";
    $result = $d->ejecutar($sql);
    if($result=="1"){
        echo("Datos editados correctamente");
    }else{
        echo($consulta.mysqli_error($d->getCon()));
    }

    mysqli_close($d->getCon()); 
}
elseif($accion=='eliminar'){
  $user = $_SESSION['user'];
  $pass= $_SESSION['pass'];
  $d = new Conexion("localhost","laboratorio",$user,$pass);
  $idresultado = $_POST['idresultado'];
  $sql = "DELETE from  resultado  where idresultado = $idresultado";
  $result = $d->ejecutar($sql);
  if($result=="1"){
      echo("Se eliminó correctamente");
  }else{
      echo($consulta.mysqli_error($d->getCon()));
  }

  mysqli_close($d->getCon()); 
}
elseif($accion=='aprobar'){
  $user = $_SESSION['user'];
  $pass= $_SESSION['pass'];
  $d = new Conexion("localhost","laboratorio",$user,$pass);
  $idresultado = $_POST['idresultado'];
  $aprobar = $_POST['aprobado'];
  $sql = "UPDATE  resultado set aprobado = $aprobar where idresultado = $idresultado";
  $result = $d->ejecutar($sql);
  if($result=="1"){
    if($aprobar=="1"){
      echo("Resultado aprobado");
    }else{
      echo("Resultado marcado como no aprobado");
    }
    
  }else{
      echo($sql.mysqli_error($d->getCon()));
  }

  mysqli_close($d->getCon()); 
}
elseif($accion=="subirImg1"){
    $imagen = $_FILES['imagen1'];
    $target_dir = "/var/www/html/Laboratorio/Uploads/Results/".$idorden."&".$idestudio."&";
    $target_file = $target_dir . basename($_FILES["imagen1"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
      $check = getimagesize($_FILES["imagen1"]["tmp_name"]);
      if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "El archivo no es una imagen.";
        return;
        $uploadOk = 0;
      }
      if (move_uploaded_file($_FILES["imagen1"]["tmp_name"], $target_file)) {
        //echo "El archivo ". htmlspecialchars( basename( $_FILES["imagen"]["name"])). " se subio correctamente.";
      } else {
        echo "Hubo un problema al subir la imagen.";
      }
  }
  elseif($accion=="subirImg2"){
    $imagen = $_FILES['imagen2'];
    $target_dir = "/var/www/html/Laboratorio/Uploads/Results/".$idorden."&".$idestudio."&";
    $target_file = $target_dir . basename($_FILES["imagen2"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
      $check = getimagesize($_FILES["imagen2"]["tmp_name"]);
      if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "El archivo no es una imagen.";
        return;
        $uploadOk = 0;
      }
      if (move_uploaded_file($_FILES["imagen2"]["tmp_name"], $target_file)) {
        //echo "El archivo ". htmlspecialchars( basename( $_FILES["imagen"]["name"])). " se subio correctamente.";
      } else {
        echo "Hubo un problema al subir la imagen.";
      }
  }

?>