<?php
session_start();
require_once "../Modelo/Conexion.php";

if($_POST['accion'] == 'guardarOrden'){
    $fecha = $_POST['fecha'];
$diagnostico = $_POST['diagnostico'];
$iddcotor = $_POST['iddoctor'];
$idempleado = $_POST['idempleado'];
$observaciones = $_POST['observaciones'];
$pago = $_POST['pago'];
$metodopago = $_POST['metodopago'];
$idcliente = $_POST['idcliente'];
$total = $_POST['total'];
$idestudios = $_POST['ids'];

$user = $_SESSION['user'];
  $pass= $_SESSION['pass'];
  $d = new Conexion("localhost","laboratorio",$user,$pass);

  $sql = "INSERT INTO ordenestudio (fecha, diagnostico, iddoctor, idempleado, 
          observaciones, pago, metodopago,idcliente, total) values('$fecha', '$diagnostico', $iddcotor, 
          $idempleado, '$observaciones',$pago,'$metodopago', $idcliente, $total)";
    $error = $d->ejecutar($sql);
    if($error){
        echo("Orden guardada con éxito");
    }
    else{
        echo "Error: " . $sql . mysqli_error($d->getCon());
    }

    $idorden = mysqli_insert_id($d->getCon());
    $_SESSION['idorden'] = $idorden;
    for($i = 0; $i<count($idestudios);$i++){
        $sqlDetalle = "INSERT INTO detalleorden (idorden, idestudio) VALUES ($idorden, $idestudios[$i])";
        
        $errorDetalle = $d->ejecutar($sqlDetalle);
        
        if($errorDetalle=="1"){
            echo("Orden guardada");
            //return;
        }else{
            echo($errorDetalle);
            return;
        }
        
        
    }
}


if($_POST['accion']=="liquidar"){
    $idorden = $_POST['idorden'];
    $faltante = $_POST['faltante'];
    $user = $_SESSION['user'];
    $pass= $_SESSION['pass'];
    $d = new Conexion("localhost","laboratorio",$user,$pass);

    $sql = "UPDATE ordenestudio set pago = pago+$faltante where idorden = $idorden";
    $error = $d->ejecutar($sql);
    if($error){
        echo("Orden liquidada con éxito");
    }
    else{
        echo "Error: " . $sql . mysqli_error($d->getCon());
    }
    mysqli_close($d->getCon()); 
    return;
} elseif($_POST['accion'] == 'buscarEstudio'){
    $ide = $_POST['ide'];
    $user = $_SESSION['user'];
    $pass= $_SESSION['pass'];
    $d = new Conexion("localhost","laboratorio",$user,$pass);
    $sql = "SELECT idEstudio, e.nombre, tipo, g.nombre, c.nombre, tipoMuestra, tiempoProced, precio 
            FROM  estudio as e inner join contenedor as c on e.contenedor = c.idContenedor 
            inner join grupo as g on e.grupo = g.idGrupo where idEstudio = $ide";
    $error = $d->ejecutar($sql);
    if($error){
        $row = mysqli_fetch_array($error);
        echo($row[0].",".$row[1].",".$row[2].",".$row[3].",".$row[4].",".$row[5].",".$row[6].",".$row[7]);
    }
    else{
        echo "Error: " . $sql . mysqli_error($d->getCon());
    }
    mysqli_close($d->getCon()); 
    return;
} 



?>