<?php
session_start();
require_once "../Modelo/Conexion.php";
$user = $_SESSION['user'];
 $pass= $_SESSION['pass'];
 $d = new Conexion("localhost","laboratorio",$user,$pass);
$idEstudio = $_GET['idestudio'];
 $sql = "SELECT * FROM valorreferencia where idestudio = $idEstudio";
 $result = $d->ejecutar($sql);
 if (mysqli_num_rows($result) > 0) :
     while($row = mysqli_fetch_assoc($result)):
  
?>
<option class="<?php echo($row['valorInicial']."/".$row['valorFinal']);?>"  value="<?php echo($row['idValorRef']); ?>"><?php echo($row['descripcion']); ?></option>
<?php
endwhile;
endif;
mysqli_close($d->getCon()); 
?>
