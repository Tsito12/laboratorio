<?php
require_once "../Modelo/Conexion.php";
session_start();
$user = $_SESSION['user'];
$pass= $_SESSION['pass'];
$d = new Conexion("localhost","laboratorio",$user,$pass);
?>

<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
    <thead class="thead-dark">
        <tr>
        <th scope="col">Código</th>
        <th scope="col">Nombre</th>
        <th scope="col">Grupo</th>
        <th scope="col">Tipo</th>
        <th scope="col">Contenedor</th>
        <th scope="col">Tiempo de procedimiento</th>
        <th scope="col">Precio</th>
        <th scope="col">Estado</th>
        <th scope="col">Accion</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $perfil = $_GET['id'];
        $estudios = $d->getDetallePerfil($perfil);
        if(count($estudios)>0):
            foreach($estudios as $e)://while ($ver=mysqli_fetch_row($result)):
        ?>
        <tr>
        <td scope="row"><?php echo($e->getIdEstudio()); ?></td>
        <td><?php echo($e->getNombreEstudio()); ?></td>
        <?php
        $idGrupo = $e->getGrupo();
        $consulta = "SELECT * from grupo where idGrupo = $idGrupo";
        $res = $d->ejecutar($consulta);
        if(!$res){
            printf("Errormessage: %s\n", mysqli_error($d->getCon()));
        }
        $reg = mysqli_fetch_array($res);
        ?>
        <td><?php echo($reg[1]); ?></td>
        <td><?php echo($e->getTipo()); ?></td>
        <?php
        $idContenedor = $e->getContenedor();
        $consulta2 = "SELECT * from contenedor where idContenedor = $idContenedor";
        $res = $d->ejecutar($consulta2);
        if(!$res){
            printf("Errormessage: %s\n", mysqli_error($d->getCon()));
        }
        $reg = mysqli_fetch_array($res);
        ?>
        <td><?php echo($reg[1]); ?></td>
        <td><?php echo($e->getTiempo()); ?></td>
        <td><?php echo($e->getPrecio()); ?></td>
        <td class="estadoE d-none"><?php echo($e->getEstado()); ?></td>
        <td class="estado"><input disabled type="checkbox" id="estadoE" value="1" name="estado"></td>
                      
        <td><button class="btn btn-danger" data-bs-dismiss="modal" onclick="EliminarDelPerfil(this)">Quitar</button></td>
        </tr>
        <?php endforeach; endif?>
    </tbody>
</table>