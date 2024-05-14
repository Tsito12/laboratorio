
<?php
session_start();
require_once "../Modelo/Conexion.php";
$user = $_SESSION['user'];
 $pass= $_SESSION['pass'];
 $d = new Conexion("localhost","laboratorio",$user,$pass);
$idOrden = $_GET['idorden'];
 $sql = "SELECT * FROM estudio as e INNER JOIN detalleorden as d on e.idEstudio = d.idestudio where d.idorden = $idOrden";
 $result = $d->ejecutar($sql);
 if (mysqli_num_rows($result) > 0) :
     while($row = mysqli_fetch_assoc($result)):
  
?>
<option value="<?php echo($row['idEstudio']); ?>"><?php echo($row['nombre']); ?></option>
<?php
endwhile;
endif;
mysqli_close($d->getCon()); 
?>
